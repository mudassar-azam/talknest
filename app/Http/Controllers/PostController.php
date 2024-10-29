<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostAttachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class PostController extends Controller
{
    public function index()
    {
        // Retrieve all posts
        $posts = Post::with('user','attachments')->get();

        return response()->json([
            'success' => true,
            'data' => $posts
        ], 200);
    }

    public function store(Request $request)
    {
        // Validate the request data
        $validator = Validator::make($request->all(), [
            'message' => 'required|string',
            'posted_by' => 'required|string',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048' // Assuming attachment is a string
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Validation error',
                'errors' => $validator->errors()
            ], 422);
        }

        // Create a new post
        $post = new Post();
        $post->message = $request->message;
        $post->posted_by = $request->posted_by;
        $post->user_id = $request->user_id;     // Assuming the user is authenticated
        $post->seen = $request->seen ?? 'false';
        if ($request->hasFile('photo')) {

            $photo = $request->file('photo');
            $photoName = time() . '_' . $photo->getClientOriginalName();
            $photopath =  Storage::disk('public')->putFileAs('photo', $photo, $photoName);
            $post->photo_name = $photoName;
        }

        $post->save();



        if ($request->hasFile('attachments')) {
            $attachments = $request->file('attachments');
            $attachmentsPaths = [];
            foreach ($attachments as $attachment) {
                $attachmentName = $attachment->getClientOriginalName();

                // Store attachment in the 'photoAttachments' directory within the 'public' disk
                $attachmentPath =  Storage::disk('public')->putFileAs('attachment', $attachment, $attachmentName);



                // Add the attachment path to the array
                $attachmentsPaths[] = $attachmentPath;

                // Create a new attachment record in the database
                PostAttachment::create([
                    'attachment_name' => $attachmentName,
                    'post_id' => $post->id,

                ]);
            }
        }

            return response()->json([
                        'success' => true,
                        'message' => 'Post created successfully',
                        'data' => $post,
                'attachments_paths' => $attachmentsPaths ?? null, // Return null if no attachments were uploaded
                'photo_path' => $photopath ?? null,
            ], 201);
                }
    public function update(Request $request, $id)
    {
        // Find the post by ID
        $post = Post::find($id);


        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => 'Post not found'
            ], 404);
        }

        // Update the post fields if provided in the request
        if ($request->has('message')) {
            $post->message = $request->message;
        }
        if ($request->has('posted_by')) {
            $post->posted_by = $request->posted_by;
        }
        if ($request->has('seen')) {
            $post->seen = $request->seen ?? false;

        }
        if ($request->hasFile('attachment')) {
            if(Storage::exists('public/photo/' . $post->photo_name)){
                Storage::delete('public/photo/' . $post->photo_name);
            }
            $attachment = $request->file('attachment');
            $attachmentName = time() . '_' . $attachment->getClientOriginalName();
            Storage::disk('public')->putFileAs('photo/', $attachment, $attachmentName);
            $post->photo_name = $attachmentName;
        }

        $post->save();

        return response()->json([
            'success' => true,
            'message' => 'Post updated successfully',
            'data' => $post
        ], 200);
    }
    public function delete($id)
    {
        // Find the post by ID
        $post = Post::find($id);

        if (!$post) {
            return response()->json([
                'success' => false,
                'message' => 'Post not found'
            ], 404);
        }

        // Delete the attachment if it exists
        if ($post->attachment_name) {
            Storage::disk('public')->delete('attachment/' . $post->attachment_name);
        }
        if (Storage::exists('public/photo/' . $post->photo_name)) {
            Storage::delete('public/photo/' . $post->photo_name);
        }

        // Delete the post from the database
        $post->delete();

        return response()->json([
            'success' => true,
            'message' => 'Post deleted successfully'
        ], 200);
    }

}
