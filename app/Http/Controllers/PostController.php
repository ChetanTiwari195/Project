<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function create()
    {
        $user =Auth::user();

        return view('create', compact('user'));
    }

    public function store(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'content' => 'required|string',
            'file' => 'nullable|mimes:jpeg,png,jpg,gif,mp4,mov,ogg,qt|max:10240',
        ]);


        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->content;
        $post->user_id = auth()->id($id); // Associate the post with the currently authenticated user


        // Handle post upload
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . "." . $extension;
            $file->move('images/posts', $filename);
            $post->file = 'images/posts/' . $filename;
        }

        

        $post->save();


        return redirect('profile')->with('success', 'Post created successfully.');
    }

    // public function show()
    // {
    //     $user = Auth::user();
    //     $post = $user->post;

    //     return 
    // }
}
