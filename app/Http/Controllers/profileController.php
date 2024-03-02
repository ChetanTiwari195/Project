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

        $profile = $user->profile;
        return view('profile', compact('profile'));
    }



    public function edit($id)
    {
        $profile = user::find($id);
        return view('profile_form', compact('profile'));
    }



    public function updateProfile(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'bio' => 'nullable|string',
            'dob' => 'nullable|date',
            'country' => 'nullable|string|max:255',
            'photo' => 'nullable|image|max:2048',
        ]);

        // Find the user by ID
        $user = User::findOrFail($id);

        // Update the user's details
        $user->name = $request->input('name');
        $user->save();

        // Find the user profile by user ID
        $profile = UserProfile::where('user_id', $user->id)->first();

        // Update the user profile details
        if ($profile) {
            $profile->name = $request->input('name');
            $profile->bio = $request->input('bio');
            $profile->dob = $request->input('dob');
            $profile->country = $request->input('country');

            // Handle photo upload if a new photo is provided
            if ($request->hasFile('photo')) {
                $photo = $request->file('photo');
                $extension = $photo->getClientOriginalExtension();
                $filename = time() . "_" . $extension;
                $photo->move('images/users', $filename);
                $profile->photo = 'images/users/' . $filename;
            }

            $profile->save();
        }

        return redirect('profile')->with('success', 'Profile updated successfully');
    }

    public function delete()
    {
        // Set a session message indicating that deletion has been requested
        session()->flash('delete_requested', 'Are you sure you want to delete your profile? This action cannot be undone.');
        return redirect('profile');
    }

    public function handleDelete($id)
    {
        User::destroy($id);
        UserProfile::destroy($id);
        return redirect('home_profile')->with('success', 'Profile deleted successfully');
    }
}
