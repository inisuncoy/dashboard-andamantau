<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ExpenseDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $token = session('token');

        $apiResponse = Http::withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/report/expenses/v1");

        $apiPengeluaranPerBulanSatuTahun = Http::withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/chart/pengeluaranPerBulanSatuTahun");
        $pengeluaranPerBulanSatuTahun = $apiPengeluaranPerBulanSatuTahun->json()['data'];

        if ($apiResponse->failed()) {
            $errors = $apiResponse->json();
            return back()->withErrors($errors)->withInput();
        }

        $expensesData = $apiResponse->json()['data'];
        $limitedExpensesData = array_slice($expensesData, 0, 4);

        // Total Pengeluaran
        $totalPengeluaran = 0;

        foreach ($expensesData as $expense) {
            $totalPengeluaran += $expense['nominal'];
        }

        // Total Pengeluaran Bulan Ini
        $currentMonth = now()->format('Y-m');
        $collection = collect($expensesData);

        $filteredExpenses = $collection->filter(function ($expense) use ($currentMonth) {
            return substr($expense['date'], 0, 7) === $currentMonth;
        });

        $totalPengeluaranBulanIni = $filteredExpenses->sum('nominal');

        // Total Pengeluaran Minggu Ini
        $currentWeekStartDate = now()->startOfWeek()->format('Y-m-d');
        $currentWeekEndDate = now()->endOfWeek()->format('Y-m-d');

        $filteredExpenses2 = $collection->filter(function ($expense) use ($currentWeekStartDate, $currentWeekEndDate) {
            return $expense['date'] >= $currentWeekStartDate && $expense['date'] <= $currentWeekEndDate;
        });

        $totalPengeluaranMingguIni = $filteredExpenses2->sum('nominal');

        return view('pages.pengeluaran.index', [
            'expensesData' => $limitedExpensesData,
            'totalPengeluaran' => $totalPengeluaran,
            'totalPengeluaranBulanIni' => $totalPengeluaranBulanIni,
            'totalPengeluaranMingguIni' => $totalPengeluaranMingguIni,
            'pengeluaranPerBulanSatuTahun' => $pengeluaranPerBulanSatuTahun
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
