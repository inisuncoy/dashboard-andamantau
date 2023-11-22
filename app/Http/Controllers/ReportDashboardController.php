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
        $apiResponse = Http::withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/report/expenses/v1");
        $apiResponse2 = Http::withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/report/incomes");

        $apiPendapatanPerBulanSatuTahun = Http::withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/chart/pendapatanPerBulanSatuTahun");
        $apiPengeluaranPerBulanSatuTahun = Http::withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/chart/pengeluaranPerBulanSatuTahun");

        $pendapatanPerBulanSatuTahun = $apiPendapatanPerBulanSatuTahun->json()['data'];
        $pengeluaranPerBulanSatuTahun = $apiPengeluaranPerBulanSatuTahun->json()['data'];

        if ($apiResponse->failed() and $apiResponse->failed()) {
            $errors = $apiResponse->json();
            $errors = $apiResponse2->json();
            return back()->withErrors($errors)->withInput();
        }

        $expensesData = $apiResponse->json()['data'];
        $incomesData = $apiResponse2->json()['data'];

        $currentMonth = now()->format('Y-m');

        // Total Pemasukan Bulan Ini
        $collection1 = collect($incomesData);

        $filteredIncomes = $collection1->filter(function ($income) use ($currentMonth) {
            return substr($income['transaction_date'], 0, 7) === $currentMonth;
        });

        $totalPemasukanBulanIni = $filteredIncomes->sum('total');

        // Total Pengeluaran Bulan Ini
        $collection2 = collect($expensesData);

        $filteredExpenses = $collection2->filter(function ($expense) use ($currentMonth) {
            return substr($expense['date'], 0, 7) === $currentMonth;
        });

        $totalPengeluaranBulanIni = $filteredExpenses->sum('nominal');

        return view('pages.laporan.index', [
            'totalPengeluaranBulanIni' => $totalPengeluaranBulanIni,
            'totalPemasukanBulanIni' => $totalPemasukanBulanIni,
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
