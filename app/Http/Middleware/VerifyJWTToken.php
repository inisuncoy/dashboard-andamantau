<?php

namespace App\Http\Middleware;

use Closure;
use JWTAuth;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

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
            $apiResponse = Http::withToken($token)->post(env('BACKEND_URL') . '/api/products', [
                'id_user' => $id_user
            ]);

            if ($apiResponse->failed()) {
                return redirect('/login');
            }
        } catch (Exception $e) {
            return redirect('/login');
        }

        return $next($request);
    }
}
