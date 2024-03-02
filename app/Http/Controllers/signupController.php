<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\UserProfile;

class signupController extends Controller
{
    public function signup()
    {
        return view('signup');
    }

    public function create(Request $request)
    {
        //validate the request
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
        ]);

        //insert data in the table
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        // saving the data from user table to userprofile table
        $userProfile = new UserProfile([
            'user_id' => $user->id,
            'name' => $request->name,
            'email' => $request->email,
        ]);

        $userProfile->save();

        return redirect()->intended('login')->with('success', 'Profile creaded successfully');
    }
}
