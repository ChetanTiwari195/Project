@extends('layouts.structure')

@section('content')
    @if (Auth::check())
        <div class="notifications max-w-lg mx-auto items-center h-screen">
            <!-- Friend Requests -->
            @foreach (Auth::user()->receivedFriendRequests as $friendRequest)
                <div class="flex px-3 py-1 bg-white items-center gap-1 rounded-lg border border-gray-100 my-3 shadow-md">
                    <div
                        class="relative w-16 h-16 rounded-full hover:bg-red-700 bg-gradient-to-r from-purple-400 via-blue-500 to-red-400 ">
                        <div
                            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-14 h-14 bg-gray-200 rounded-full border-2 border-white">
                            <img class="w-full h-full object-cover rounded-full"
                                src="{{ asset($friendRequest->sender->profile->photo) }}"
                                alt="{{ $friendRequest->sender->name }}'s photo">
                        </div>
                    </div>
                    @if ($friendRequest->accepted == null)
                        <div class="flex justify-between">
                            <div>
                                <span class="font-mono">{{ $friendRequest->sender->name }} has sent you a friend
                                    request.</span>
                            </div>
                            <div class="flex gap-2">
                                <form action="{{ route('friend-request.accept', $friendRequest->id) }}" method="POST">
                                    @csrf
                                    <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                                                clip-rule="evenodd" />
                                        </svg></button>
                                </form>
                                <form action="{{ route('friend-request.decline', $friendRequest->id) }}" method="POST">
                                    @csrf
                                    <button type="submit"><svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5"
                                            viewBox="0 0 20 20" fill="currentColor">
                                            <path fill-rule="evenodd"
                                                d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z"
                                                clip-rule="evenodd" />
                                        </svg></button>
                                </form>
                            </div>
                        </div>
                    @elseif ($friendRequest->accepted == true)
                        <span class="font-mono">You have accepted this friend request.</span>
                    @else
                        <span class="font-mono">You have declined this friend request.</span>
                    @endif
                </div>
            @endforeach

            <!-- Likes -->
            @foreach (Auth::user()->likes as $like)
                <div
                    class="flex justify-between px-3 py-1 bg-white items-center gap-1 rounded-lg border border-gray-100 my-3 shadow-md">
                    <div
                        class="relative w-16 h-16 rounded-full hover:bg-red-700 bg-gradient-to-r from-purple-400 via-blue-500 to-red-400 ">
                        <div
                            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-14 h-14 bg-gray-200 rounded-full border-2 border-white">
                            <img class="w-full h-full object-cover rounded-full" src="{{asset( $like->user->profile->photo )}}"
                                alt="{{ $like->user->name }}'s photo">
                        </div>
                    </div>
                    <div>
                        <span class="font-mono">{{ $like->user->name }} liked your post.</span>
                    </div>
                    <div>
                        <svg width="30px" height="30px" viewBox="0 0 24 24" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path class="like-icon" fill-rule="evenodd" clip-rule="evenodd"
                                d="M12 6.00019C10.2006 3.90317 7.19377 3.2551 4.93923 5.17534C2.68468 7.09558 2.36727 10.3061 4.13778 12.5772C5.60984 14.4654 10.0648 18.4479 11.5249 19.7369C11.6882 19.8811 11.7699 19.9532 11.8652 19.9815C11.9483 20.0062 12.0393 20.0062 12.1225 19.9815C12.2178 19.9532 12.2994 19.8811 12.4628 19.7369C13.9229 18.4479 18.3778 14.4654 19.8499 12.5772C21.6204 10.3061 21.3417 7.07538 19.0484 5.17534C16.7551 3.2753 13.7994 3.90317 12 6.00019Z"
                                stroke="#000000" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                </div>
            @endforeach

            <!-- Comments -->
            @foreach (Auth::user()->comments as $comment)
                <div
                    class="flex justify-between px-3 py-1 bg-white items-center gap-1 rounded-lg border border-gray-100 my-3 shadow-md">
                    <div
                        class="relative w-16 h-16 rounded-full hover:bg-red-700 bg-gradient-to-r from-purple-400 via-blue-500 to-red-400 ">
                        <div
                            class="absolute top-1/2 left-1/2 transform -translate-x-1/2 -translate-y-1/2 w-14 h-14 bg-gray-200 rounded-full border-2 border-white">
                            <img class="w-full h-full object-cover rounded-full"
                                src="{{asset( $comment->user->profile->photo )}}" alt="{{ $comment->user->name }}'s photo">
                        </div>
                    </div>
                    <div>
                        <span class="font-mono">{{ $comment->user->name }} commented on your post:
                            {{ $comment->content }}</span>
                    </div>
                    <div>
                        <svg width="30px" height="30px" viewBox="0 -0.5 25 25" fill="none"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M5.5 12.9543C5.51239 14.0398 5.95555 15.076 6.73197 15.8348C7.50838 16.5936 8.55445 17.0128 9.64 17.0003H11.646C12.1915 17.0007 12.7131 17.224 13.09 17.6183L14.159 18.7363C14.3281 18.9076 14.5588 19.004 14.7995 19.004C15.0402 19.004 15.2709 18.9076 15.44 18.7363L17.1 17.0003L17.645 16.3923C17.7454 16.2833 17.8548 16.1829 17.972 16.0923C18.9349 15.3354 19.4979 14.179 19.5 12.9543V8.04428C19.4731 5.7845 17.6198 3.97417 15.36 4.00028H9.64C7.38021 3.97417 5.5269 5.7845 5.5 8.04428V12.9543Z"
                                stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"
                                fill="none" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M7.5 10.5002C7.5 9.94796 7.94772 9.50024 8.5 9.50024C9.05228 9.50024 9.5 9.94796 9.5 10.5002C9.5 11.0525 9.05228 11.5002 8.5 11.5002C8.23478 11.5002 7.98043 11.3949 7.79289 11.2074C7.60536 11.0198 7.5 10.7655 7.5 10.5002Z"
                                stroke="#000000" stroke-linecap="round" stroke-linejoin="round" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M11.5 10.5002C11.5 9.94796 11.9477 9.50024 12.5 9.50024C13.0523 9.50024 13.5 9.94796 13.5 10.5002C13.5 11.0525 13.0523 11.5002 12.5 11.5002C11.9477 11.5002 11.5 11.0525 11.5 10.5002Z"
                                stroke="#000000" stroke-linecap="round" stroke-linejoin="round" />
                            <path fill-rule="evenodd" clip-rule="evenodd"
                                d="M15.5 10.5002C15.5 9.94796 15.9477 9.50024 16.5 9.50024C17.0523 9.50024 17.5 9.94796 17.5 10.5002C17.5 11.0525 17.0523 11.5002 16.5 11.5002C15.9477 11.5002 15.5 11.0525 15.5 10.5002Z"
                                stroke="#000000" stroke-linecap="round" stroke-linejoin="round" />
                        </svg>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
