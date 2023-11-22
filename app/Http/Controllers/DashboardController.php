<?php

namespace App\Http\Controllers;

use Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Http;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        try {
            if (session('auth_login') == 'success') {
                Alert::toast('Selamat datang di dashboard UMKM', 'success');
            }

            if (session('RTO') == 'error') {
                Alert::toast('Request Time Out!', 'error');
            }

            $token = session('token');

            $apiDashboardMetrics = Http::withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/dashboardMetrics");

            $nullChartMonthData = [
                "labels" => [
                    "January",
                    "February",
                    "March",
                    "April",
                    "May",
                    "June",
                    "July",
                    "August",
                    "September",
                    "October",
                    "November",
                    "December"
                ],
                "datasets" => [
                    0,
                    0,
                    0,
                    0,
                    0,
                    0,
                    0,
                    0,
                    0,
                    0,
                    0,
                    0,
                ]
            ];

            $nullChartWeekData = [
                "labels" => [
                    "Sunday",
                    "Monday",
                    "Tuesday",
                    "Wednesday",
                    "Thursday",
                    "Friday",
                    "Saturday",
                ],
                "datasets" => [
                    0,
                    0,
                    0,
                    0,
                    0,
                    0,
                    0,
                ]
            ];

            $pengeluaran = $apiDashboardMetrics->json()['data']['pengeluaran'] ?? null;
            $labaBersih = $apiDashboardMetrics->json()['data']['laba_bersih'] ?? null;
            $pesananBaru = $apiDashboardMetrics->json()['data']['pesanan_baru'] ?? null;
            $barangTerjual = $apiDashboardMetrics->json()['data']['total_terjual_barang'] ?? null;
            $itemTerpopuler = $apiDashboardMetrics->json()['data']['popular_items'] ?? null;
            $pendapatanPerBulanSatuTahun = $apiDashboardMetrics->json()['data']['pendapatanPerBulanSatuTahun'] ?? $nullChartMonthData;
            $pendapatanPerHariSatuMinggu = $apiDashboardMetrics->json()['data']['pendapatanPerHariSatuMinggu'] ?? $nullChartWeekData;
            $peningkatanPesananPerBulanSatuTahun = $apiDashboardMetrics->json()['data']['peningkatanPesananPerBulanSatuTahun'] ?? $nullChartMonthData;



            if ($request->query('sortBy')) {
                $apiSortProductByStock = Http::withToken($token)->post(config('backend.backend_url') . "/api/dashboard/umkm/sortProductByStock", [
                    'sortBy' => $request->query('sortBy')
                ]);
            } else {
                $apiSortProductByStock = Http::withToken($token)->post(config('backend.backend_url') . "/api/dashboard/umkm/sortProductByStock", [
                    'sortBy' => 'desc'
                ]);
            }

            $sortProductByStock = $apiSortProductByStock->json()['data'] ?? null;
        } catch (RequestException $e) {
            Log::error('HTTP request failed: ' . $e->getMessage());
        } catch (ClientException $e) {
            Log::error('Client error: ' . $e->getMessage());
        } catch (ServerException $e) {
            Log::error('Server error: ' . $e->getMessage());
        } catch (Exception $e) {
            Log::error('An unexpected error occurred: ' . $e->getMessage());
        }

        return view('pages.dashboard.index', [
            'pengeluaran' => $pengeluaran,
            'labaBersih' => $labaBersih,
            'pesananBaru' => $pesananBaru,
            'barangTerjual' => $barangTerjual,
            'pendapatanPerBulanSatuTahun' => $pendapatanPerBulanSatuTahun,
            'pendapatanPerHariSatuMinggu' => $pendapatanPerHariSatuMinggu,
            'peningkatanPesananPerBulanSatuTahun' => $peningkatanPesananPerBulanSatuTahun,
            'itemTerpopuler' => $itemTerpopuler,
            'sortProductByStock' => $sortProductByStock
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
