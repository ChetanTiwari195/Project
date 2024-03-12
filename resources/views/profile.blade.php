@extends('layouts.structure')

@section('content')
    <div class="bg-white font-sans">
        <div class="container mx-auto py-8">
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
                            <button type="submit"
                                class="bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">Yes,
                                Delete</button>
                            <a href="{{ url('/profile') }}"
                                class="bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded ml-4">Cancel</a>
                        </form>
                    </div>
                </div>
            @endif
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
                            @if (Auth::check() && Auth::id() != $user->id && !Auth::user()->isFriendWith($user))
                                <form action="{{ route('friend-request.send', $user->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-primary">Send Friend Request</button>
                                </form>
                            @endif
                            <a href="{{ url('/profile.edit', $profile->user_id) }}"
                                class="text-blue-500 hover:underline mr-4">Edit</a>
                            <a href="{{ url('/profile.delete') }}" class="text-red-500 hover:underline mr-4">Delete</a>
                        </div>
                    </div>

                </div>
            </div>
            @if (Auth::check() && Auth::id() == $user->id)
                <div class="friend-requests">
                    @foreach (Auth::user()->receivedFriendRequests as $friendRequest)
                        <div class="friend-request">
                            <p>{{ $friendRequest->sender->name }} has sent you a friend request.</p>
                            @if ($friendRequest->accepted == null)
                                <form action="{{ route('friend-request.accept', $friendRequest->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-success">Accept</button>
                                </form>
                                <form action="{{ route('friend-request.decline', $friendRequest->id) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-danger">Decline</button>
                                </form>
                            @elseif ($friendRequest->accepted == true)
                                <p>You have accepted this friend request.</p>
                            @else
                                <p>You have declined this friend request.</p>
                            @endif
                        </div>
                    @endforeach
                </div>
            @endif
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

    {{-- @include('layouts.post_btn') --}}
