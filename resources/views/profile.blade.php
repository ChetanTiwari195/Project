@extends('layouts.structure')

@section('content')
    <div class="container mx-auto px-4 py-5">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
            <div class="mb-4">
                <h2 class="text-gray-700 text-2xl font-bold mb-2">Profile Details</h2>
                <div class="flex justify-end mt-4">
                    <a href="{{ url('/profile.edit', $profile->user_id)}}" class="text-blue-500 hover:text-blue-700">Edit Profile</a>
                </div>
                    <p class="text-gray-700 text-base">Name: {{ $profile->name }}</p>
                    <p class="text-gray-700 text-base">Email: {{ $profile->email }}</p>
                    <p class="text-gray-700 text-base">Bio: {{ $profile->bio }}</p>
                    <p class="text-gray-700 text-base">Date of Birth: {{ $profile->dob }}</p>
                    <p class="text-gray-700 text-base">Country: {{ $profile->country }}</p>
            </div>
            <!-- Add more user details here -->
        </div>
    </div>
@endsection
