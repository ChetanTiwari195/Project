<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use App\Models\likes;
use App\Models\comments;
use App\Models\FriendRequest;

class CheckNewAlerts
{
    public function handle($request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();

            // Get the latest timestamps from likes, comments, and friend_requests
            $latestLikeTimestamp = likes::where('user_id', $user->id)->max('created_at');
            $latestCommentTimestamp = comments::where('user_id', $user->id)->max('created_at');
            $latestFriendRequestTimestamp = FriendRequest::where('receiver_id', $user->id)->max('created_at');

            // Get the last time the user visited the alerts page
            $lastVisitedAlerts = Session::get('lastVisitedAlerts');

            // Determine if there are new alerts
            $hasNewAlerts = max($latestLikeTimestamp, $latestCommentTimestamp, $latestFriendRequestTimestamp) > $lastVisitedAlerts;

            // Mark that the user has seen their alerts
            Session::put('lastVisitedAlerts', now());

            // Share the data with all views
            view()->share('hasNewAlerts', $hasNewAlerts);
        }

        return $next($request);
    }
}
