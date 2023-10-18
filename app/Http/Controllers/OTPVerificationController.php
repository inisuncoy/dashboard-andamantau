<?php

namespace App\Http\Controllers;

use Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class OTPVerificationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (url()->previous() == url('/reset-password')) {
            session()->forget('tokenOTP');
        }

        if (session('email') == null) {
            return redirect('/login');
        }

        if (session('lupa_sandi') == 'success') {
            Alert::toast('Token telah dikirim ke email kamu!', 'success');
        }

        return view('pages.auth.verifikasi-otp.index');
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

        $tokenOTP1 = $request->input('tokenOTP1');
        $tokenOTP2 = $request->input('tokenOTP2');
        $tokenOTP3 = $request->input('tokenOTP3');
        $tokenOTP4 = $request->input('tokenOTP4');
        $tokenOTP5 = $request->input('tokenOTP5');
        $tokenOTP6 = $request->input('tokenOTP6');

        $combinedToken = $tokenOTP1 . $tokenOTP2 . $tokenOTP3 . $tokenOTP4 . $tokenOTP5 . $tokenOTP6;

        $email = session('email');

        $apiResponse = Http::post(config('backend.backend_url') . "/api/forgot-password/verify", [
            'email' => $email,
            'token' => $combinedToken
        ]);

        if ($apiResponse->failed()) {
            $errors = $apiResponse->json();
            return back()->withErrors($errors);
        }

        Session::put(['tokenOTP' => $combinedToken]);


        return redirect('/reset-password')->with(['verif_otp' => 'success']);
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
