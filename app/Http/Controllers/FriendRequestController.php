<?php

namespace App\Http\Controllers;

use App\Models\FriendRequest;
use App\Models\User;
use App\Notifications\FriendRequestSent;
use Illuminate\Http\Request;

class FriendRequestController extends Controller
{
    public function sendRequest(Request $request, $id)
    {
        // Check if a request already exists
        $existingRequest = FriendRequest::where('sender_id', auth()->id())
            ->where('receiver_id', $id)
            ->first();

        if ($existingRequest) {
            return back()->with('error', 'Friend request already sent.');
        }

        // Create a new friend request
        FriendRequest::create([
            'sender_id' => auth()->id(),
            'receiver_id' => $id,
        ]);

        // Send a notification to the receiver
        // Assuming you have a FriendRequestSent notification
        $receiver = User::find($id);
        $receiver->notify(new FriendRequestSent(auth()->user()));

        return back()->with('success', 'Friend request sent.');
    }

    public function acceptRequest(Request $request, $id)
    {
        // Find the friend request
        $friendRequest = FriendRequest::where('sender_id', $id)
            ->where('receiver_id', auth()->id())
            ->first();

        if (!$friendRequest) {
            return back()->with('error', 'Friend request not found.');
        }

        // Accept the friend request
        $friendRequest->update(['accepted' => true]);

        // Optionally, you can also create a mutual friend relationship here

        return back()->with('success', 'Friend request accepted.');
    }

    public function declineRequest(Request $request, $id)
    {
        // Find the friend request
        $friendRequest = FriendRequest::where('sender_id', $id)
            ->where('receiver_id', auth()->id())
            ->first();

        if (!$friendRequest) {
            return back()->with('error', 'Friend request not found.');
        }

        // Delete the friend request
        $friendRequest->delete();

        return back()->with('success', 'Friend request declined.');
    }
}
