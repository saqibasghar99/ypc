<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CheckSessionAuth
{
    public function handle(Request $request, Closure $next)
    {
        // Check if user_id exists in session
        if (!Session::has('user_id')) {
            return redirect('/signin')->with('error', 'Please login to access your profile');
        }

        // Verify the user exists in database
        $userExists = \DB::table('users')
            ->where('id', Session::get('user_id'))
            ->exists();

        if (!$userExists) {
            Session::forget('user_id');
            return redirect('/signin')->with('error', 'Session expired, please login again');
        }

        return $next($request);
    }
}