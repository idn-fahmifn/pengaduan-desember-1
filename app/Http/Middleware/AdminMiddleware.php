<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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

        // jika yang login itu adlaah admin, arahkan ke dashboard.
        if(Auth::check() && Auth::user()->isAdmin )
        {
            return $next($request);
        }
        // jika bukan admin
        return redirect()->route('halaman-user');

    }
}
