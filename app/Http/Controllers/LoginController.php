<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Alert;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (url()->previous() == url('/lupa-sandi/verifikasi-otp') or url()->previous() == url('/reset-password')) {
            session()->forget('email');
            session()->forget('tokenOTP');
        }

        if (session('ubah_password') == 'success') {
            Alert::success('Password berhasil diubah!', 'Silahkan login kembali');
        }

        return view('pages.auth.login.index');
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
        $credentials = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        $apiResponse = Http::post(config('backend.backend_url') . '/api/login', $credentials);

        if ($apiResponse->failed()) {
            $errors = $apiResponse->json();
            return back()->withErrors($errors)->withInput();
        }

        $token = $apiResponse->json()['data']['jwt_token'];
        $userData = $apiResponse->json()['data']['user'];

        $request->session()->put('token', $token);
        $request->session()->put('userData', $userData);

        return redirect('/')->with(['auth_login' => 'success']);
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
