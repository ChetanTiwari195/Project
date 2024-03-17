@extends('layouts.structure')

@section('content')
    <link rel="stylesheet" href="https://unpkg.com/flowbite@1.4.4/dist/flowbite.min.css" />

    <div class="max-w-2xl mx-auto">

        <form action="{{ route('search') }}" method="GET" class="flex items-center mb-8 md:mb-12 mt-4">
            <label for="simple-search" class="sr-only">Search</label>
            <div class="relative w-full">
                <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                    <svg class="w-5 h-5 text-gray-500 dark:text-gray-400" fill="currentColor" viewBox="0 0 20 20"
                        xmlns="http://www.w3.org/2000/svg">
                        <path fill-rule="evenodd"
                            d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                            clip-rule="evenodd"></path>
                    </svg>
                </div>
                <input type="text" id="simple-search"
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full pl-10 p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    placeholder="Search by email / name" required>
            </div>
            <button type="submit"
                class="p-2.5 ml-2 text-sm font-medium text-white bg-blue-700 rounded-lg border border-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                    xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </button>
        </form>

        @if ($users->isNotEmpty())
            <div class="space-y-4">
                @foreach ($users as $user)
                    <a href="{{ url('/profile/' . $user->id) }}" class="block hover:bg-gray-100 rounded-lg p-4">
                        <div class="flex items-center border-b border-gray-200 pb-4">
                            <div class="w-16 h-16">
                                @if (isset($user) && $user->profile->photo)
                                    <img src="{{ asset($user->profile->photo) }}" alt="Profile Photo"
                                        class="w-full h-full object-cover rounded-full">
                                @else
                                    <img src="{{ asset('images/user-svgrepo-com.svg') }}" alt="Profile Photo"
                                        class="w-full h-full object-cover rounded-full">
                                @endif
                            </div>
                            <div class="ml-4">
                                <h2 class="text-xl font-bold">{{ $user->name }}</h2>
                                <p class="text-sm text-gray-600 text-right">{{ $user->email }}</p>
                            </div>
                        </div>
                    </a>
                @endforeach
            </div>
        @else
            <p class="text-center">No users found.</p>
        @endif
    </div>
@endsection
