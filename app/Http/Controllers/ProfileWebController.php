<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProfileWebController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $token = session('token');
        $user_id = session('userData')['id'];

        $apiResponse = Http::withToken($token)->get(env('BACKEND_URL') . '/api/umkm/' . $user_id);

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
        $token = session('token');
        $user_id = session('userData')['id'];

        $apiResponse = Http::withToken($token)->get(env('BACKEND_URL') . '/api/umkm/' . $user_id);

        if ($apiResponse->failed()) {
            $errors = $apiResponse->json();
            return back()->withErrors($errors)->withInput();
        }

        $umkmData = $apiResponse->json()['data'];
        $umkmSlug = $apiResponse->json()['slug'];

        return view('pages.profil-web.edit.index', [
            'umkmData' => $umkmData,
            'umkmSlug' => $umkmSlug,
        ]);
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
