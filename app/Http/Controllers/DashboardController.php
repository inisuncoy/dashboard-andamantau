<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Alert;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (session('auth_login') == 'success') {
            Alert::toast('Selamat datang di dashboard UMKM', 'success');
        }

        $token = session('token');

        $apiPengeluaran = Http::withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/pengeluaran");
        $apiLabaBersih = Http::withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/labaBersih");
        $apiPesananBaru = Http::withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/pesananBaru");
        $apiBarangTerjual = Http::withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/barangTerjual");

        $pengeluaran = $apiPengeluaran->json()['data'];
        $labaBersih = $apiLabaBersih->json()['data'];
        $pesananBaru = $apiPesananBaru->json()['data'];
        $barangTerjual = $apiBarangTerjual->json()['data'];

        return view('pages.dashboard.index', [
            'pengeluaran' => $pengeluaran,
            'labaBersih' => $labaBersih,
            'pesananBaru' => $pesananBaru,
            'barangTerjual' => $barangTerjual
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
