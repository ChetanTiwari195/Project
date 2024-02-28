@extends('layouts.structure')

@section('content')
<div class="container mx-auto px-4 py-5">
    <div class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4 flex flex-col">
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="username">
                Username
            </label>
            <p class="text-gray-700 text-base">{{ $user->name }}</p>
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
                Email
            </label>
            <p class="text-gray-700 text-base">{{ $user->email }}</p>
        </div>
        <!-- Add more user details here -->
    </div>
</div>
@endsection
