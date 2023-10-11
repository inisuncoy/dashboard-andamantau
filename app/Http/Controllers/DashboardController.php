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

        $apiPengeluaran = Http::retry(3, 100)->withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/pengeluaran");
        $apiLabaBersih = Http::retry(3, 100)->withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/labaBersih");
        $apiPesananBaru = Http::retry(3, 100)->withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/pesananBaru");
        $apiBarangTerjual = Http::retry(3, 100)->withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/barangTerjual");
        $apiPendapatanPerBulanSatuTahun = Http::retry(3, 100)->withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/chart/pendapatanPerBulanSatuTahun");
        $apiPendapatanPerHariSatuMinggu = Http::retry(3, 100)->withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/chart/pendapatanPerHariSatuMinggu");
        $apiPeningkatanPesananPerBulanSatuTahun = Http::retry(3, 100)->withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/chart/peningkatanPesananPerBulanSatuTahun");

        $pengeluaran = $apiPengeluaran->json()['data'];
        $labaBersih = $apiLabaBersih->json()['data'];
        $pesananBaru = $apiPesananBaru->json()['data'];
        $barangTerjual = $apiBarangTerjual->json()['data'];
        $pendapatanPerBulanSatuTahun = $apiPendapatanPerBulanSatuTahun->json()['data'];
        $pendapatanPerHariSatuMinggu = $apiPendapatanPerHariSatuMinggu->json()['data'];
        $peningkatanPesananPerBulanSatuTahun = $apiPeningkatanPesananPerBulanSatuTahun->json()['data'];

        return view('pages.dashboard.index', [
            'pengeluaran' => $pengeluaran,
            'labaBersih' => $labaBersih,
            'pesananBaru' => $pesananBaru,
            'barangTerjual' => $barangTerjual,
            'pendapatanPerBulanSatuTahun' => $pendapatanPerBulanSatuTahun,
            'pendapatanPerHariSatuMinggu' => $pendapatanPerHariSatuMinggu,
            'peningkatanPesananPerBulanSatuTahun' => $peningkatanPesananPerBulanSatuTahun
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
