<?php

namespace App\Http\Middleware;

use Closure;
use Exception;
use Illuminate\Support\Facades\Http;

class VerifyJWTToken
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle($request, Closure $next)
    {
        $token = session('token');

        if (!$token) {
            return redirect('/login');
        }

        $id_user = session('userData')['id'];

        try {
            $apiResponse = Http::withToken($token)->get(env('BACKEND_URL') . '/api/dashboard/umkm/profile');

            if ($apiResponse->failed()) {
                return redirect('/login');
            }
        } catch (Exception $e) {
            return redirect('/login');
        }

        return $next($request);
    }
}
