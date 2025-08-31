<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       
    if (!Auth::guard('users')->check()) {
        return redirect()->route('login');
    }

    $user = Auth::user();
    if (!in_array($user->role, ['admin', 'super_admin'])) {
        abort(403, 'Access denied: Admin only.');
    }

    return $next($request);
    }
}
