<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class VerifyJWTToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        if (!$request->session()->has('token')) {
            return redirect('/login');
        }

        if ($request->session()->all()['userData']['id_role'] !== 2) {
            return redirect('/login')->with('auth', 'failed');
        }

        return $next($request);
    }
}
