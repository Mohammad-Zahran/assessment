<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\User;

class TrackRequests
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
public function handle(Request $request, Closure $next): Response
{
    $userId = $request->header('user_id'); 

    if ($userId) {
        $user = User::find($userId);
        if ($user) {
            $user->increment('requests_num');
        }
    }

    return $next($request);
}

}
