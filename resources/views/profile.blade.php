@extends('layouts.structure')

@section('content')
    <div class="container mx-auto px-4 py-5">
        <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                    Username
                </label>
                @isset($user->profile)
                    <p class="text-gray-700 text-base">{{ $user->profile->name }}</p>
                    <p class="text-gray-700 text-base">{{ $user->profile->email }}</p>
                @endisset
            </div>
            <!-- Add more user details here -->
        </div>
    </div>
@endsection
