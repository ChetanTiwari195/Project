<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class SearchController extends Controller
{
    public function redirect(){

        $users =  User::all();
        return view('search', compact('users'));
    }

    public function index(Request $request)
    {
        $searchTerm = $request->get('search');
        $users = User::where('email', 'like', '%' . $searchTerm . '%')->orwhere('name', 'like', '%' . $searchTerm . '%')->get();

        // Ensure $users is always an array, even if the query returns null
        $users = $users ?? collect();
        return view('search', compact('users'));
    }
}
