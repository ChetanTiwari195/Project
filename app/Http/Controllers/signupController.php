<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class signupController extends Controller
{
    public function signup()
    {
        return view('signup');
    }

    public function create(Request $request)
    {
        //validate the request
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'password' => 'required | confirmed',
            'password_confirmation' => 'required'
        ]);
        //insert data in the table
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->save();

        return view('profile');
    }
}
