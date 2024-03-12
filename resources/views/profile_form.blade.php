@extends('layouts.structure')

@section('content')
    <div class="container mx-auto px-4 py-5">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
            <div class="mb-4">
                <h2 class="text-gray-700 text-2xl font-bold mb-2">Edit Profile</h2>
                <form action="{{ url('/profile.update', $profile->user_id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
                            Name
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="name" type="text" name="name"
                            value="{{$profile->name}}" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="bio">
                            Bio
                        </label>
                        <textarea
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="bio" name="bio" value="{{$profile->bio}}" required></textarea>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="dob">
                            Date of Birth
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="dob" type="date" name="dob"
                            value="{{$profile->dob}}" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="country">
                            Country
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="country" type="text" name="country"
                            value="{{$profile->country}}" required>
                    </div>
                    <div class="mb-4">
                        <label class="block text-gray-700 text-sm font-bold mb-2" for="photo">
                            Profile Photo
                        </label>
                        <input
                            class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
                            id="photo" type="file" name="photo">
                    </div>
                    <div class="flex items-center justify-between">
                        <button
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline"
                            type="submit">
                            Save Profile
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
