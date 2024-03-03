<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        $user = Auth::user();

        if ($user && in_array($user->user_role, $roles)) {
            return $next($request);
        }

        // Redirect or respond as needed for unauthorized access
        return redirect()->route('login')->with('error', 'Unauthorized access.');
    }
}
