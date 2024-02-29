<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProfile;

class profileController extends Controller
{
    public function profile()
    {
        $user = Auth::user();
        if (!$user->profile) {
            $profile = new UserProfile;
            $profile->name = $user->name;
            $profile->email = $user->email;
            $profile->user_id = $user->id;
            $profile->save();
        }
        return view('profile', compact('user'));
    }
}
