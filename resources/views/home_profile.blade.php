@extends('layouts.structure')

@section('content')
    <div class="flex justify-center p-4">
        <div class="flex items-center">
            @if (session()->has('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                    {{ session('success') }}
                </div>
            @endif

            <!-- User Profile Picture -->
            @if (isset($profile) && $profile->photo)
                <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-gray-800 shadow-lg">
                    <img src="{{ asset($profile->photo) }}" alt="Profile Photo" class="object-cover w-full h-full">
                </div>
            @else
                <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-blue-500">
                    <img src="{{ asset('images/user-svgrepo-com.svg') }}" alt="Default Profile Photo" />
                </div>
            @endif

            <div class="ml-4 font-bold text-gray-800 text-2xl">{{ $profile->name }}</div>
        </div>
    </div>
    <!-- Responsive Grid Layout for Friends' Posts -->
    <div class="main-content flex flex-col items-center mt-8 pd-4">
        @foreach ($posts as $post)
            @include('layouts.card', ['post' => $post, 'friendDetail' => $post->user->profile])
        @endforeach
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
