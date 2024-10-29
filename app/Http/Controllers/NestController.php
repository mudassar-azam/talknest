<?php

namespace App\Http\Controllers;

use App\Models\Nest;
use App\Models\NestPeople;
use App\Models\NestSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class NestController extends Controller
{
    public function index()
    {
        // Fetch nests with their settings using eager loading
        $nests = Nest::with('nestSetting', 'nestPeople', 'adminUser')->get();

        return response()->json(['nests' => $nests], 200);
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();

            $validator = Validator::make($request->all(), [
                'name' => 'required|string',
                'description' => 'required|string',
                'discussion' => 'boolean',
                'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'cover_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'admin_id' => 'required|exists:users,id', // Assuming admin_id refers to an existing user
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            // Validate the nest settings
            $validator = Validator::make($request->all(), [
                'nest_privacy' => 'required|string',
                'activity_feed_privacy' => 'required|string',
                'photo_privacy' => 'required|string',
                'nest_message_privacy' => 'required|string',
                'invitation_privacy' => 'required|string',
            ]);

            if ($validator->fails()) {
                return response()->json(['errors' => $validator->errors()], 422);
            }

            $nest = new Nest();
            $nest->name = $request->name;
            $nest->description = $request->description;
            $nest->discussion = $request->discussion ?? false;
            $nest->admin_id = $request->admin_id;

                      if ($request->hasFile('photo')) {

                $photo = $request->file('photo');
                $photoName = time() . '_' . $photo->getClientOriginalName();
                $photo->move(public_path('storage/nestImages'), $photoName);
                $nest->photo_name = $photoName;
            }

            if ($request->hasFile('cover_photo')) {
                $coverPhoto = $request->file('cover_photo');
                $coverPhotoName =time() . '_' . $coverPhoto->getClientOriginalName();
                $coverPhoto->move(public_path('storage/nestImages'), $coverPhotoName);
                $nest->cover_photo_name = $coverPhotoName;
            }

            $nest->save();

            $setting = new NestSetting();
            $setting->nest_privacy = $request->nest_privacy;
            $setting->activity_feed_privacy = $request->activity_feed_privacy;
            $setting->photo_privacy = $request->photo_privacy;
            $setting->nest_message_privacy = $request->nest_message_privacy;
            $setting->invitation_privacy = $request->invitation_privacy;
            $setting->nest_id = $nest->id; // Assuming nest_id is the foreign key

            $setting->save();



        $imagePath = $photoName ? url('storage/nestImages/' . $photoName) : null;
        $coverImagePath = $coverPhotoName ? url('storage/nestImages/' . $coverPhotoName) : null;
            return response()->json([
                'nest' => array_merge($nest->toArray(), ['setting' => $setting]),
                'photo_path' => $imagePath ?? null,
                'cover_photo_path' => $coverImagePath ?? null,

                ], 201);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 422);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();

            // Find the nest by ID
            $nest = Nest::findOrFail($id);

            // Update nest details if provided in the request
            if ($request->has('name')) {
                $nest->name = $request->name;
            }

            if ($request->has('description')) {
                $nest->description = $request->description;
            }

            if ($request->has('discussion')) {
                $nest->discussion = $request->discussion;
            }

            if ($request->has('admin_id')) {
                $nest->admin_id = $request->admin_id;
            }


            if ($request->hasFile('photo')) {
                if (Storage::exists('public/nest/' . $nest->photo_name)) {
                    Storage::delete('public/nest/' . $nest->photo_name);
                }
                $photo = $request->file('photo');
                $photoName = time() . '_' . uniqid() . '.' . $photo->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('nest', $photo, $photoName);
                $nest->photo_name = $photoName;
            }

            if ($request->hasFile('cover_photo')) {
                if (Storage::exists('public/nest/' . $nest->cover_photo_name)) {
                    Storage::delete('public/nest/' . $nest->cover_photo_name);
                }
                $coverPhoto = $request->file('cover_photo');
                $coverPhotoName = time() . '_' . uniqid() . '.' . $coverPhoto->getClientOriginalExtension();
                Storage::disk('public')->putFileAs('nest', $coverPhoto, $coverPhotoName);
                $nest->cover_photo_name = $coverPhotoName;
            }


            $nest->save();

            // Update nest setting details if provided in the request
            $setting = NestSetting::firstOrNew(['nest_id' => $nest->id]);

            if ($request->has('nest_privacy')) {
                $setting->nest_privacy = $request->nest_privacy;
            }

            if ($request->has('activity_feed_privacy')) {
                $setting->activity_feed_privacy = $request->activity_feed_privacy;
            }

            if ($request->has('photo_privacy')) {
                $setting->photo_privacy = $request->photo_privacy;
            }

            if ($request->has('nest_message_privacy')) {
                $setting->nest_message_privacy = $request->nest_message_privacy;
            }

            if ($request->has('invitation_privacy')) {
                $setting->invitation_privacy = $request->invitation_privacy;
            }

            $setting->nest_id = $nest->id; // Assuming nest_id is the foreign key

            // Save the setting
            $setting->save();

            DB::commit();

            return response()->json(['nest' => $nest], 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['error' => $e->getMessage()], 422);
        }

    }

    public function show($id)
    {

        // Fetch the nest with its settings using eager loading
        $nest = Nest::with([
            'nestPeople' => function ($query) {
                $query->where('invitation_status', 'accept');
            },
            'posts',
            'nestSetting',
            'adminUser' // Assuming 'adminUser' is the name of the relationship with the User model
        ])->find($id);
        return response()->json(['nest' => $nest], 200);
    }

    public function destroy($id)
    {
        // Start transaction
        DB::beginTransaction();

        // Find the nest by ID
        $nest = Nest::find($id);
        if (!$nest) {
            // Rollback transaction if the nest is not found
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Nest not found'], 404);
        }

        try {
            // Delete the corresponding nest setting, if it exists
            $nestSetting = NestSetting::where('nest_id', $nest->id)->first();
            if ($nestSetting) {
                $nestSetting->delete();
            }

            // Delete related records from the NestPeople table
            NestPeople::where('nest_id', $nest->id)->delete();

            // Delete the nest
            if (Storage::exists('public/nest/' . $nest->cover_photo_name)) {
                Storage::delete('public/nest/' . $nest->cover_photo_name);
            }
            if (Storage::exists('public/nest/' . $nest->photo_name)) {
                Storage::delete('public/nest/' . $nest->photo_name);
            }
            $nest->delete();

            // Commit transaction
            DB::commit();

            return response()->json(['message' => 'Nest deleted successfully'], 200);
        } catch (\Exception $e) {
            // Rollback transaction if an error occurs
            DB::rollBack();
            return response()->json(['success' => false, 'message' => 'Failed to delete nest'], 500);
        }
    }


}
