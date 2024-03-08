<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\FriendRequest;
use App\Models\Post;
use App\Models\UserProfile;

class welcomeController extends Controller
{
    public function index(){
        
        return view('welcome');
    }

    public function profileindex(){

        $user = Auth::user();
        $profile = $user->profile;
        $posts = Post::whereIn('user_id', function ($query) use ($user) {
        $query->select('sender_id')
            ->from('friend_requests')
            ->where('receiver_id', $user->id)
            ->where('accepted', 1);
    })->get();
        return view('home_profile', compact('profile', 'posts'));
    }
}
