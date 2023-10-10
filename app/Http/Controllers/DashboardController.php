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
        //
        $apiResponse = Http::withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/report/expenses");

        if ($apiResponse->failed()) {
            $errors = $apiResponse->json();
            return back()->withErrors($errors)->withInput();
        }

        $expensesData = $apiResponse->json()['data'];

        // Total Pengeluaran Bulan Ini
        $currentMonth = now()->format('Y-m');
        $collection = collect($expensesData);

        $filteredExpenses = $collection->filter(function ($expense) use ($currentMonth) {
            return substr($expense['date'], 0, 7) === $currentMonth;
        });

        $totalPengeluaranBulanIni = $filteredExpenses->sum('nominal');


        $collection = collect($expensesData);

        // Get the current month and year
        $currentMonth = now()->format('Y-m');

        // Calculate the sum of expenses for the current month
        $currentMonthExpenses = $collection->filter(function ($expense) use ($currentMonth) {
            return substr($expense['date'], 0, 7) === $currentMonth;
        })->sum('nominal');

        // Calculate the sum of expenses for the previous month
        $previousMonth = now()->subMonth()->format('Y-m');
        $previousMonthExpenses = $collection->filter(function ($expense) use ($previousMonth) {
            return substr($expense['date'], 0, 7) === $previousMonth;
        })->sum('nominal');

        if ($previousMonthExpenses > 0) {
            $percentageChange = (($currentMonthExpenses - $previousMonthExpenses) / $previousMonthExpenses) * 100;
        } else {
            $percentageChange = 0; // Avoid division by zero
        }

        return view('pages.dashboard.index', [
            'totalPengeluaranBulanIni' => $totalPengeluaranBulanIni,
            'persentaseChangePengeluaran' => $percentageChange
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
