<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProfile;

class profileController extends Controller
{
    public function save()
    {
        $user = Auth::user();
        if (!$user->profile) {
            $profile = new UserProfile;
            $profile->name = $user->name;
            $profile->email = $user->email;
            $profile->user_id = $user->id;
            $profile->save();
        }
        return redirect('profile.save');
    }

    public function profile_view(){
        $user = Auth::User();
        return view('profile', compact('user'));
    }
}
