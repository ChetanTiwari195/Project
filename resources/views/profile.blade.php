@extends('layouts.structure')

@section('content')
    <div class="z-0 justify-items-center bg-red-600">
        @if (session()->has('success'))
            <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4">
                {{ session('success') }}
            </div>
        @endif
        @if (session()->has('delete_requested'))
            <div class="fixed inset-0 flex items-center justify-center z-50">
                <div class="bg-white p-6 rounded shadow-lg">
                    <p class="text-center text-lg font-bold">{{ session('delete_requested') }}</p>
                    <form action="{{ route('profile.handleDelete', $profile->user_id) }}" method="POST" class="mt-4">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Yes,
                            Delete</button>
                        <a href="{{ url('/profile') }}"
                            class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded ml-4">Cancel</a>
                    </form>
                </div>
            </div>
        @endif
        <div class="p-8 bg-white shadow mt-24">
            <div class="grid grid-cols-1 md:grid-cols-3">
                <div class="grid grid-cols-3 text-center order-last md:order-first mt-20 md:mt-0">
                    <div>
                        <p class="font-bold text-gray-700 text-xl">22</p>
                        <p class="text-gray-400">Friends</p>
                    </div>
                    <div>
                        <p class="font-bold text-gray-700 text-xl">10</p>
                        <p class="text-gray-400">Photos</p>
                    </div>
                    <div>
                        <p class="font-bold text-gray-700 text-xl">89</p>
                        <p class="text-gray-400">Comments</p>
                    </div>
                </div>
                <div class="relative">
                    <div>
                        @if ($profile->photo)
                            <img src="{{ asset($profile->photo) }}" alt="Profile Photo"
                                class="w-48 h-48 mx-auto rounded-full shadow-2xl absolute inset-x-0 top-0 -mt-24 flex items-center justify-center object-cover" />
                        @else
                            <img src="{{ asset('images/user-svgrepo-com.svg') }}" alt="Default Profile Photo"
                                class="w-48 h-48 mx-auto rounded-full shadow-2xl absolute inset-x-0 top-0 -mt-24 flex items-center justify-center object-cover" />
                        @endif
                    </div>
                </div>
                <div class="space-x-8 flex justify-between mt-32 md:mt-0 md:justify-center">
                    @if (Auth::check() && Auth::id() != $user->id && !Auth::user()->isFriendWith($user))
                        <form action="{{ route('friend-request.send', $user->id) }}" method="POST">
                            @csrf
                            <button type="submit"
                                class="text-white py-2 px-4 uppercase rounded bg-blue-400 hover:bg-blue-500 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">Send
                                Friend Request</button>
                        </form>
                    @endif
                    <a href="{{ url('/profile.edit', $profile->user_id) }}"
                        class="text-white justify-center py-4 px-4 uppercase rounded bg-gray-700 hover:bg-gray-800 shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">
                        Edit</a>
                    <a href="{{ url('/profile.delete') }}"
                        class=" text-red-600 justify-center py-4 px-4 uppercase rounded bg-slate-50 hover:bg-red-600 hover:text-white shadow hover:shadow-lg font-medium transition transform hover:-translate-y-0.5">
                        Delete
                    </a>
                </div>
            </div>
            <div class="mt-20 text-center border-b pb-12">
                <h1 class="text-4xl font-medium text-gray-700">{{ $profile->name }}</h1>
                @if ($profile->country)
                    <p class="font-light text-gray-600 mt-3">{{ $profile->country }}</p>
                @endif
                @if ($profile->dob)
                    <p class="mt-2 text-gray-500">🎂 {{ $profile->dob }}</p>
                @endif
            </div>
            @if ($profile->bio)
                <div class="mt-12 flex flex-col justify-center">
                    <p class="text-gray-600 text-center font-light lg:px-16">{{ $profile->bio }}
                    </p>
                </div>
            @endif
        </div>
    </div>
    <div class="mt-8">
        <a href="{{ route('post.create') }}"
            class="fixed bottom-10 right-10 shadow-md bg-indigo-400 text-slate-900 antialiased font-bold py-2 px-2 rounded-full hover:bg-indigo-300 transition duration-300">
            <svg xmlns="http://www.w3.org/2000/svg" width="26" height="26" viewBox="0 0 24 24">
                <path fill="currentColor"
                    d="M12.75 11.25V5a.75.75 0 0 0-1.5 0v6.25H5a.75.75 0 0 0 0 1.5h6.25V19a.76.76 0 0 0 .75.75a.75.75 0 0 0 .75-.75v-6.25H19a.75.75 0 0 0 .75-.75a.76.76 0 0 0-.75-.75Z" />
            </svg>
        </a>
    </div>
@endsection