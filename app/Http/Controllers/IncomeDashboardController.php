<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Alert;

class IncomeDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $token = session('token');

            if (session('APIFailed')) {
                Alert::toast(session('APIFailed'), 'error');
            }

            $apiResponse = Http::withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/report/dashboardIncomesMetrics");

            $incomesData = $apiResponse->json()['data']['incomesData'];
            $pendapatanPerBulanSatuTahun = $apiResponse->json()['data']['chartData'];
            $totalPemasukan = $apiResponse->json()['data']['totalPemasukan'];
            $totalPemasukanBulanIni = $apiResponse->json()['data']['totalPemasukanBulanIni'];
            $totalPemasukanMingguIni = $apiResponse->json()['data']['totalPemasukanMingguIni'];

            return view('pages.pemasukan.index', [
                'incomesData' => $incomesData,
                'pendapatanPerBulanSatuTahun' => $pendapatanPerBulanSatuTahun,
                'totalPemasukan' => $totalPemasukan,
                'totalPemasukanBulanIni' => $totalPemasukanBulanIni,
                'totalPemasukanMingguIni' => $totalPemasukanMingguIni
            ]);

        } catch (RequestException $e) {
            Log::error('HTTP request failed: ' . $e->getMessage());
        } catch (ClientException $e) {
            Log::error('Client error: ' . $e->getMessage());
        } catch (ServerException $e) {
            Log::error('Server error: ' . $e->getMessage());
        } catch (Exception $e) {
            Log::error('An unexpected error occurred: ' . $e->getMessage());
        }
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
