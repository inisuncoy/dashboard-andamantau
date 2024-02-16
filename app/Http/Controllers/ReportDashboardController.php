<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Alert;

class ReportDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $token = session('token');

        if (session('RTO') == 'error') {
            Alert::toast('Request Time Out!', 'error');
        }
        //
        $apiResponse = Http::withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/reports");
        $totalPemasukanBulanIni = $apiResponse->json()['data']['totalPemasukanBulanIni'];
        $totalPengeluaranBulanIni = $apiResponse->json()['data']['totalPengeluaranBulanIni'];
        $totalLabaBulanIni = $apiResponse->json()['data']['totalLabaBulanIni'];
        $pendapatanPerBulanSatuTahun = $apiResponse->json()['data']['incomeChartData'];
        $pengeluaranPerBulanSatuTahun = $apiResponse->json()['data']['expenseChartData'];

        return view('pages.laporan.index', [
            'totalPemasukanBulanIni' => $totalPemasukanBulanIni,
            'totalPengeluaranBulanIni' => $totalPengeluaranBulanIni,
            'totalLabaBulanIni' => $totalLabaBulanIni,
            'pendapatanPerBulanSatuTahun' => $pendapatanPerBulanSatuTahun,
            'pengeluaranPerBulanSatuTahun' => $pengeluaranPerBulanSatuTahun,
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
