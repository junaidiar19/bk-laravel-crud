<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // check user is not admin
        if (!auth()->user()->isAdmin()) {

            // redirect to page status code: 403 (Unauthorized)
            return abort(403);
        }

        // continue to next middleware
        return $next($request);
    }
}
