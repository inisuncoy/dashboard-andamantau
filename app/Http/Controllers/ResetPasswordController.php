<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Alert;
use Illuminate\Support\Facades\Http;

class ResetPasswordController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (session('email') == null or session('tokenOTP') == null) {
            return redirect('/login');
        }

        if (session('verif_otp') == 'success') {
            Alert::toast('Verifikasi OTP berhasil! Silahkan masukkan password baru', 'success');
        }

        return view('pages.auth.reset-password.index');
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

        $apiResponse = Http::post(config('backend.backend_url') . "/api/reset-password", [
            'token' => session('tokenOTP'),
            'email' => session('email'),
            'password' => $request->password,
            'password_confirmation' => $request->password_confirmation
        ]);

        if ($apiResponse->failed()) {
            $errors = $apiResponse->json();
            return back()->withErrors($errors);
        }

        session()->forget('tokenOTP');
        session()->forget('obfuscated_email');
        session()->forget('email');

        return redirect('/login')->with(['ubah_password' => 'success']);
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
