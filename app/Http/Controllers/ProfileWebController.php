<?php

namespace App\Http\Controllers;

use Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

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

        $apiResponse = Http::withToken($token)->get(config('backend.backend_url') . '/api/dashboard/umkm/profile');

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

        $apiResponse = Http::withToken($token)->get(config('backend.backend_url') . '/api/dashboard/umkm/profile');
        $apiResponse2 = Http::withToken($token)->get(config('backend.backend_url') . '/api/dashboard/umkm/profileCities');

        if ($apiResponse->failed() and $apiResponse2->failed()) {
            $errors = $apiResponse->json();
            return back()->withErrors($errors)->withInput();
        }

        $umkmCities = $apiResponse2->json()['data'];
        $umkmData = $apiResponse->json()['data'];

        return view('pages.profil-web.edit.index', [
            'umkmData' => $umkmData,
            'umkmCities' => $umkmCities
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $token = session('token');

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $imageName = str_replace(' ', '', $file->getClientOriginalName());
            $file->storeAs('temp/image/', $imageName, 'public');
            $filePath = storage_path('app/public/temp/image/' . $imageName);

            $apiResponse = Http::attach(
                'file',
                file_get_contents($filePath),
                $imageName
            )->withToken($token)->post(config('backend.backend_url') . '/api/dashboard/umkm/profile', $request->all());

            if ($apiResponse->successful()) {
                unlink($filePath);
            }
        } else {
            $apiResponse = Http::withToken($token)->post(config('backend.backend_url') . '/api/dashboard/umkm/profile', $request->all());
        }

        if ($apiResponse->failed()) {
            $errors = $apiResponse->json();
            return back()->with('update_profil', 'failed')->withErrors($errors);
        }

        return redirect('/profil-toko')->with('update_profil', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
