<?php

namespace App\Http\Controllers;

use App\Models\FriendRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class FriendRequestController extends Controller
{
    public function sendRequest(Request $request)
    {
        // Validate incoming request
        $request->validate([
            'sender_id' => 'required|exists:users,id',
            'recipient_id' => 'required|exists:users,id',
        ]);

        // Check if a friend request already exists between these users
        $existingRequest = FriendRequest::where('sender_id', $request->sender_id)
            ->where('recipient_id', $request->recipient_id)
            ->first();

        if ($existingRequest) {
            return response()->json([
                'success'=>false,
                'message' => 'Friend request already sent'
            ], 400);
        }

        // Create a new friend request
        $friendRequest = new FriendRequest();
        $friendRequest->sender_id = $request->sender_id;
        $friendRequest->recipient_id = $request->recipient_id;
        $friendRequest->save();

        return response()->json([
            'success'=>true,
            'message' => 'Friend request sent successfully'], 200);
    }
    public function receiveRequests($userId)
    {
        // Find the user by ID
        $user = User::find($userId);

        if (!$user) {
            return response()->json([
                'success'=>false,
                'message' => 'User not found'
            ], 404);
        }

        // Retrieve all friend requests sent to the user with sender information
        $friendRequests = FriendRequest::with('sender')->where('recipient_id', $userId)->get();

        return response()->json([
            'success'=>true,
            'friend_requests' => $friendRequests
        ], 200);
    }
    public function acceptRequest($id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'status' => 'required|in:accept,reject'
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => 'Invalid input',
                'errors' => $validator->errors()
            ], 400);
        }

        $friendRequest = FriendRequest::find($id);
        if (!$friendRequest) {
            return response()->json([
                'success' => false,
                'message' => 'Friend request not found'
            ], 404);
        }

        if ($request->status === 'accept') {
            // Mark the friend request as accepted
            $friendRequest->accepted = true;
            $friendRequest->save();

            return response()->json([
                'success' => true,
                'message' => 'Friend request accepted'
            ], 200);
        } elseif ($request->status === 'reject') {
            // Delete the friend request
            $friendRequest->delete();

            return response()->json([
                'success' => true,
                'message' => 'Friend request rejected'
            ], 200);
        }
    }


    public function getAcceptedFriends($userId)
    {

        $authUser= User::find($userId);
        // Find the user by ID
        // Get the authenticated user


        if (!$authUser) {
            return response()->json(['message' => 'User not found'], 404);
        }

        // Retrieve the friend requests where the authenticated user is the sender or receiver and accepted = 1
        $friendRequests = FriendRequest::where(function ($query) use ($authUser) {
            $query->where('sender_id', $authUser->id)
                ->orWhere('recipient_id', $authUser->id);
        })
            ->where('accepted', 1)
            ->select('sender_id', 'recipient_id')
            ->get();

        // Extract sender and receiver IDs from friend requests
        $friendIds = [];
        foreach ($friendRequests as $request) {
            if ($request->sender_id != $authUser->id) {
                $friendIds[]= $request->sender_id;
            }
            if ($request->recipient_id != $authUser->id) {
                $friendIds []= $request->recipient_id;
            }
        }
        // Fetch users corresponding to friend IDs
        $friends = User::whereIn('id', $friendIds)->get();


        return response()->json(['friends' => $friends], 200);

    }
}
