@extends('layouts.structure')

@section('content')
    <div class="bg-white font-sans">
        <div class="container mx-auto py-8">
            <div class="max-w-lg mx-auto bg-blue-100 rounded-lg shadow-lg overflow-hidden">
                <div class="px-6 py-4">
                    <div class="flex items-center justify-center">
                        <div class="w-24 h-24 rounded-full overflow-hidden border-4 border-blue-500">
                            @if ($profile->photo)
                                <img src="{{ asset($profile->photo) }}" alt="Profile Photo" />
                            @else
                                <img src="{{ asset('images/user-svgrepo-com.svg') }}" alt="Default Profile Photo" />
                            @endif
                        </div>
                        <div class="ml-6">
                            <h2 class="text-2xl font-bold text-blue-900">{{ $profile->name }}</h2>
                        </div>
                    </div>
                    <div class="mt-4">
                        @if ($profile->bio)
                            <div class="text-blue-800">
                                <h3 class="text-lg font-semibold">Bio</h3>
                                <p>{{ $profile->bio }}</p>
                            </div>
                        @endif

                        @if ($profile->country)
                            <div class="mt-4 text-blue-800">
                                <h3 class="text-lg font-semibold">Country</h3>
                                <p>{{ $profile->country }}</p>
                            </div>
                        @endif

                        @if ($profile->dob)
                            <div class="mt-4 text-blue-800">
                                <h3 class="text-lg font-semibold">Date of Birth</h3>
                                <p>{{ $profile->dob }}</p>
                            </div>
                        @endif

                        <div class="mt-4 flex justify-end">
                            <a href="{{ url('/profile.edit', $profile->user_id) }}"
                                class="text-blue-500 hover:underline mr-4">Edit</a>
                            <a href="{{ url('/profile.delete', $profile->user_id) }}"
                                class="text-red-500 hover:underline mr-4">Delete</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
