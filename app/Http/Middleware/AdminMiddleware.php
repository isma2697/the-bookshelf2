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
    public function handle($request, Closure $next)
    {
        if (auth()->check() && auth()->user()->is_admin) {
            return $next($request);
        }
    
        return redirect('/')->with('error', 'No tienes permisos para acceder a esta página');
    }
    
    // public function handle(Request $request, Closure $next)
    // {
    //     if (!$request->user() || !$request->user()->is_admin) {
    //         return redirect('/')->with('error', 'No tienes permisos para acceder a esta página');
    //     }

    //     return $next($request);
    // }
}
