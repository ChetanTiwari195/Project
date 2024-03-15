<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\Post;
use App\Models\likes;

class LikeController extends Controller
{
    public function toggle(Request $request, Post $post)
    {
        $like = likes::where('user_id', auth()->user()->id)
            ->where('post_id', $post->id)
            ->first();

        if ($like) {
            // If the user has already liked the post, remove the like
            $like->delete();
            return response()->json(['liked' => false]);
        } else {
            // If the user hasn't liked the post, add a new like
            $newLike = new likes();
            $newLike->user_id = auth()->user()->id;
            $newLike->post_id = $post->id;
            $newLike->save();
            return response()->json(['liked' => true]);
        }
    }
}
