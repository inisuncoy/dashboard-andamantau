<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class ForgotPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (url()->previous() == url('/lupa-sandi/verifikasi-otp')) {
            session()->forget('email');
            session()->forget('obfuscated_email');
        }

        return view('pages.auth.forgot-password.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $apiResponse = Http::post(config('backend.backend_url') . "/api/forgot-password", [
            'email' => $request->email
        ]);

        if ($apiResponse->failed()) {
            $errors = $apiResponse->json();
            return back()->withErrors($errors);
        }

        $email = $request->email;

        $parts = explode('@', $email);

        if (count($parts) == 2) {
            $username = $parts[0];
            $domain = $parts[1];

            $obfuscatedUsername = $username[0] . str_repeat('*', strlen($username) - 1);
            $obfuscatedEmail = $obfuscatedUsername . '@' . $domain;

            Session::put(['email' => $request->email, 'obfuscated_email' => $obfuscatedEmail]);
            return redirect('/lupa-sandi/verifikasi-otp')->with(['message', 'Kode OTP telah dikirim ke email kamu!', 'lupa_sandi' => 'success']);
        } else {
            // Handle invalid email address
            return redirect('/lupa-sandi')->with('error', 'Invalid email address');
        }
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
