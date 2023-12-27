<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAkses
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role): Response
    {
        if(auth()->check()) {
            // Check if the user has the required role
            if(auth()->user()->role == $role) {
                return $next($request);
            }
        }

        // If the user does not have the required role, you can handle it accordingly
        // For example, you can redirect the user or return a forbidden response
        return back();
    }
}
