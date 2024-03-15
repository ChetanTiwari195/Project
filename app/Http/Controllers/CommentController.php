<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\comments;

class CommentController extends Controller
{
    public function index(Post $post)
    {
        $comments = comments::where('post_id', $post->id)
            ->with('user') 
            ->get();

        return response()->json($comments);
    }

    public function store(Request $request, Post $post)
    {
        $comment = new comments();
        $comment->user_id = auth()->user()->id;
        $comment->post_id = $post->id;
        $comment->content = $request->content;
        $comment->save();

        $comment->user = auth()->user()->name;
        
        return response()->json($comment);
    }
}
