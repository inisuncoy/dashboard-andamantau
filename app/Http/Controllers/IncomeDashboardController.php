<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class IncomeDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $token = session('token');

        $apiResponse = Http::withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/report/incomes");
        $apiResponse2 = Http::withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/transactionPaymentList");

        if ($apiResponse->failed()) {
            $errors = $apiResponse->json();
            return back()->withErrors($errors)->withInput();
        }

        $incomesData = $apiResponse->json()['data'];
        $limitedIncomesData = array_slice($incomesData, 0, 4);

        $paymentTypes = $apiResponse2->json()['data'];

        $currentMonth = now()->format('Y-m');
        $collection = collect($incomesData);

        // Total Pengeluaran
        $totalPemasukan = 0;

        foreach ($incomesData as $income) {
            $totalPemasukan += $income['total'];
        }

        // Total Pemasukan Bulan Ini
        $filteredIncomes = $collection->filter(function ($income) use ($currentMonth) {
            return substr($income['transaction_date'], 0, 7) === $currentMonth;
        });

        $totalPemasukanBulanIni = $filteredIncomes->sum('total');

        // Total Pengeluaran Minggu Ini
        $currentWeekStartDate = now()->startOfWeek()->format('Y-m-d');
        $currentWeekEndDate = now()->endOfWeek()->format('Y-m-d');

        $filteredIncomes2 = $collection->filter(function ($income) use ($currentWeekStartDate, $currentWeekEndDate) {
            return $income['transaction_date'] >= $currentWeekStartDate && $income['transaction_date'] <= $currentWeekEndDate;
        });

        $totalPengeluaranMingguIni = $filteredIncomes2->sum('total');

        return view('pages.pemasukan.index', [
            'incomesData' => $limitedIncomesData,
            'paymentTypes' => $paymentTypes,
            'totalPemasukan' => $totalPemasukan,
            'totalPemasukanBulanIni' => $totalPemasukanBulanIni,
            'totalPengeluaranMingguIni' => $totalPengeluaranMingguIni,


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
