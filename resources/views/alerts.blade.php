@extends('layouts.structure')

@section('content')
    @if (Auth::check())
        <div class="notifications">
            <!-- Friend Requests -->
            @foreach (Auth::user()->receivedFriendRequests as $friendRequest)
                <div class="notification">
                    <div class="profile-photo">
                        <img src="{{ asset($friendRequest->sender->profile->photo) }}"
                            alt="{{ $friendRequest->sender->name }}'s photo">
                    </div>
                    <div class="notification-content">
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
                </div>
            @endforeach

            <!-- Likes -->
            @foreach (Auth::user()->likes as $like)
                <div class="notification">
                    <div class="profile-photo">
                        <img src="{{ $like->user->profile_photo_url }}" alt="{{ $like->user->name }}'s photo">
                    </div>
                    <div class="notification-content">
                        <p>{{ $like->user->name }} liked your post.</p>
                    </div>
                </div>
            @endforeach

            <!-- Comments -->
            @foreach (Auth::user()->comments as $comment)
                <div class="notification">
                    <div class="profile-photo">
                        <img src="{{ $comment->user->profile_photo_url }}" alt="{{ $comment->user->name }}'s photo">
                    </div>
                    <div class="notification-content">
                        <p>{{ $comment->user->name }} commented on your post: {{ $comment->content }}</p>
                    </div>
                </div>
            @endforeach
        </div>
    @endif
@endsection
