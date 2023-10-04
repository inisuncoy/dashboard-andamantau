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


        // try {
        //     $apiResponse = Http::withToken($token)->get(env('BACKEND_URL') . '/api/dashboard/umkm/profile');

        //     if ($apiResponse->failed()) {
        //         return redirect('/login');
        //     }
        // } catch (Exception $e) {
        //     return redirect('/login');
        // }

        return $next($request);
    }
}
