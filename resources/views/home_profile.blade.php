@extends('layouts.structure')

@section('content')
    <div class="flex justify-start p-4">
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
    <div class="grid grid-cols-3 gap-4 mt-8">
        @include('layouts.card', ['posts' => $posts])

    </div>
@endsection
