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
        $user_id = session('userData')['id'];

        $apiResponse = Http::withToken($token)->post(env('BACKEND_URL') . "/api/reports/incomes", [
            'id_user' => $user_id
        ]);

        if ($apiResponse->failed()) {
            $errors = $apiResponse->json();
            return back()->withErrors($errors)->withInput();
        }



        $incomesData = $apiResponse->json()['data'];
        $limitedIncomesData = array_slice($incomesData, 0, 4);

        return view('pages.pemasukan.index', [
            'incomesData' => $limitedIncomesData
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
