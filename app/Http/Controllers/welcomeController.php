<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use App\Models\User;
use App\Models\UserProfile;

class welcomeController extends Controller
{
    public function index(){
        
        return view('welcome');
    }

    public function profileindex(){

        $user = Auth::user();

        $profile = $user->profile;
        return view('home_profile', compact('profile'));
    }
}
