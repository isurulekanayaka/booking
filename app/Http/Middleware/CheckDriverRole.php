<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckDriverRole
{
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if ($user && $user->user_role === 'driver') {
            return $next($request);
        }

        return redirect()->route('login')->with('error', 'Unauthorized access.');
    }
}
