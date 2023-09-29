<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Alert;

class ProfileWebController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (session('update_profil') == 'success') {
            Alert::success('Profile berhasil diganti');
        }

        $token = session('token');

        $apiResponse = Http::withToken($token)->get(env('BACKEND_URL') . '/api/umkm/profile/me');

        if ($apiResponse->failed()) {
            $errors = $apiResponse->json();
            return back()->withErrors($errors)->withInput();
        }

        $umkmData = $apiResponse->json()['data'];

        return view('pages.profil-web.index', [
            'umkmData' => $umkmData,
        ]);
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
        //
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
    public function edit()
    {
        if (session('update_profil') == 'failed') {
            Alert::error('Gagal Mengupdate Profile!');
        }

        $token = session('token');

        $apiResponse = Http::withToken($token)->get(env('BACKEND_URL') . '/api/umkm/profile/me');

        if ($apiResponse->failed()) {
            $errors = $apiResponse->json();
            return back()->withErrors($errors)->withInput();
        }

        $umkmData = $apiResponse->json()['data'];
        $umkmCity = $apiResponse->json()['user_city'];

        return view('pages.profil-web.edit.index', [
            'umkmData' => $umkmData,
            'umkmCity' => $umkmCity
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $token = session('token');

        $apiResponse = Http::withToken($token)->patch(env('BACKEND_URL') . '/api/umkm/profile/edit', $request->all());

        if ($apiResponse->failed()) {
            return back()->with('update_profil', 'failed');
        }

        return redirect('/profil-web')->with('update_profil', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
