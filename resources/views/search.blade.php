@extends('layouts.structure')

@section('content')
    <div class="container mx-auto px-4 py-4">
        <form action="{{ route('search') }}" method="GET" class=" mb-8 flex items-center justify-center">
            <input type="text" name="search" placeholder="Search by email" class="w-3/4 p-2 border rounded-full"
                style="max-width: 500px;">
            <button type="submit" class="p-2 bg-blue-500 text-white rounded-full ml-2">Search</button>
        </form>

        @if ($users->isNotEmpty())
            <div class="p-2">
                @foreach ($users as $user)
                    @if (isset($user) && $user->profile->photo)
                        <a href="{{ url('/profile/' . $user->id) }}">
                            <div class="flex items-center">
                                <div class="w-16 h-16">
                                    <img src="{{ asset($user->profile->photo) }}" alt="Profile Photo"
                                        class="w-full h-full object-cover rounded-full">
                                </div>
                                <div class="ml-4">
                                    <h2 class="text-xl font-bold">{{ $user->name }}</h2>
                                    <p class="text-sm text-gray-600 text-right">{{ $user->email }}</p>
                                </div>
                            </div>
                        </a>
                        <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-300">
                    @else
                        <a href="{{ url('/profile/' . $user->id) }}">
                            <div class="flex items-center">
                                <div class="w-16 h-16">
                                    <img src="{{ asset('images/user-svgrepo-com.svg') }}" alt="Profile Photo"
                                        class="w-full h-full object-cover rounded-full">
                                </div>
                                <div class="ml-4">
                                    <h2 class="text-xl font-bold">{{ $user->name }}</h2>
                                    <p class="text-sm text-gray-600 text-right">{{ $user->email }}</p>
                                </div>
                            </div>
                        </a>
                        <hr class="h-px my-2 bg-gray-200 border-0 dark:bg-gray-300">
                    @endif
                @endforeach
            </div>
        @else
            <p>No users found.</p>
        @endif
    </div>
@endsection
