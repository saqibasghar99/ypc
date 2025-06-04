<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (session()->get('id')) {
            $user = \App\Models\User::find(session()->get('id'));

            if ($user && $user->role === 'admin') {
                return $next($request);
            }
        }
        return redirect()->route('404');
    }
}
