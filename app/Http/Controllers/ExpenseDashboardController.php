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
    { {
            $token = session('token');
            $user_id = session('userData')['id'];

            $apiResponse = Http::withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/report/expenses");


            if ($apiResponse->failed()) {
                $errors = $apiResponse->json();
                return back()->withErrors($errors)->withInput();
            }

            $expensesData = $apiResponse->json()['data'];
            $limitedExpensesData = array_slice($expensesData, 0, 4);

            return view('pages.pengeluaran.index', [
                'expensesData' => $limitedExpensesData
            ]);
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
