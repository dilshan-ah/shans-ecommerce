<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->user()) {
            // User is not logged in
            return redirect('login')->with('error', 'You need to log in to access this page.');
        }

        if ($request->user()->usertype !== 'admin') {
            // User is logged in but is not an admin
            return redirect('404')->with('error', 'You are not authorized to access this page.');
        }

        return $next($request);
    }

}
