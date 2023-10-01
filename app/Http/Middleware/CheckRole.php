<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        // Get the authenticated user
        $user = Auth::user();

        // Check if the user has one of the allowed roles
        if (!$user || !in_array($user->role, $roles)) {
            // Redirect or return a response as needed
            switch ($user->role) {
                case 1:
                    return redirect()->route('admin');
                // break;
                case 2:
                    return redirect()->route('examiners');
                // break;
                case 3:
                    return redirect()->route('examinee');
                // break;
                default:
                    return redirect()->route('landing');
                // break;
            }
            // You can customize this route
        }

        return $next($request);
    }
}