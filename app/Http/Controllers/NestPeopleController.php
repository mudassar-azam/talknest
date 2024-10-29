<?php

namespace App\Http\Controllers;

use App\Models\FriendRequest;
use App\Models\Nest;
use App\Models\NestPeople;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class NestPeopleController extends Controller
{
    public function sendRequest(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'nest_id' => 'required|exists:nests,id',


        ]);

        // Check if the validation fails
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->all()
            ], 400);
        }
        $nest = Nest::find($request->nest_id);
        if (!$nest){
           return response()->json([
               'success'=>false,
               'message' => 'Nest not found'], 403);
            }
        // Check if a request from this user for this nest already exists
        $existingRequest = NestPeople::where('user_id', $request->user_id)
            ->where('nest_id', $request->nest_id)
            ->exists();

        if ($existingRequest) {
            return response()->json([
                'success' => false,
                'message' => 'Request already sent for this nest.'
            ], 403);
        }


        // Check if the user is the admin of the nest
//        if ($nest->admin_id !== auth()->id()) {
//            return response()->json(['error' => 'You are not authorized to perform this action.'], 403);
//        }


        // Attach the user to the nest

        $nestPeople = new NestPeople();
        $nestPeople->nest_id = $request->nest_id;
        $nestPeople->user_id = $request->user_id;
        $nestPeople->save();

        return response()->json(['message' => 'request sent for nest.'], 200);
    }

    public function showUserPendingRequests($userId)
    {
        $pendingRequests = NestPeople::with('nest')
            ->where('user_id', $userId)
            ->where('invitation_status','0')

            ->get();


        return response()->json([
            'success' => true,
            'user_pending_requests' => $pendingRequests
        ], 200);
    }

    public function updateRequest(Request $request, $id)
    {
        // Validate request data
        $validator = Validator::make($request->all(), [
            'invitation_status' => 'required|in:accept,reject'
        ]);

        // Check if the validation fails
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->all()
            ], 400);
        }

        // Find the friend request
        $requestRecord = NestPeople::find($id);

        if (!$requestRecord) {
            return response()->json([
                'success' => false,
                'message' => 'Friend request not found.'
            ], 404);
        }

        // Update the status based on the action
        if ($request->invitation_status == 'accept') {
            $requestRecord->invitation_status = 'accept'; // Accepted
            $message = 'Nest invitation accepted successfully.';
        } elseif ($request->invitation_status == 'reject') {
            // Call separate method to handle deletion
            return $this->deleteRequest($id);
        } else {
            return response()->json([
                'success' => false,
                'message' => 'Invalid action.'
            ], 400);
        }

        // Save the changes
        $requestRecord->save();

        return response()->json([
            'success' => true,
            'message' => $message
        ], 200);
    }

    public function deleteRequest($id)
    {
        // Find the friend request
        $requestRecord = NestPeople::find($id);

        if (!$requestRecord) {
            return response()->json([
                'success' => false,
                'message' => 'Friend request not found.'
            ], 404);
        }

        // Delete the record from the database
        $requestRecord->delete();

        return response()->json([
            'success' => true,
            'message' => 'Nest invitation rejected successfully.'
        ], 200);
    }
     public function directJoinNest(Request $request)
    {


        $validator = Validator::make($request->all(), [
            'user_id' => 'required|exists:users,id',
            'nest_id' => 'required|exists:nests,id',

        ]);

        // Check if the validation fails
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()->all()
            ], 400);
        }
        $nest = Nest::find($request->nest_id);
        if (!$nest) {
            return response()->json([
                'success' => false,
                'message' => 'Nest not found'], 403);
        }



        // Check if the user is the admin of the nest
//        if ($nest->admin_id !== auth()->id()) {
//            return response()->json(['error' => 'You are not authorized to perform this action.'], 403);
//        }


        // Attach the user to the nest

        $nestPeople = new NestPeople();
        $nestPeople->nest_id = $request->nest_id;
        $nestPeople->user_id = $request->user_id;
        $nestPeople->invitation_status = 'accept';
        $nestPeople->save();

        return response()->json(['message' => 'request sent for nest.'], 200);
    }
}
