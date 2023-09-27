<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $token = session('token');
        $user_id = session('userData')['id'];

        $apiResponse = Http::withToken($token)->post(env('BACKEND_URL') . "/api/transactions", [
            'id_user' => $user_id
        ]);

        if ($apiResponse->failed()) {
            $errors = $apiResponse->json();
            return back()->withErrors($errors)->withInput();
        }

        $transactionsData = $apiResponse->json()['data'];

        return view('pages.transaksi.index', [
            'transactionsData' => $transactionsData
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
        $token = session('token');

        $apiResponse = Http::withToken($token)->get(env('BACKEND_URL') . "/api/transaction/" . $id);

        if ($apiResponse->failed()) {
            $errors = $apiResponse->json();
            return back()->withErrors($errors)->withInput();
        }

        $transactionData = $apiResponse->json()['data'];

        $productList = $transactionData['product_list'];

        foreach ($productList as $key => $product) {
            $idProduct = $product['id_product'];

            $productResponse = Http::withToken($token)->get('https://api.andamantau.com/api/product/' . $idProduct);
            $productData = $productResponse->json()['data'];

            // Add the product data to the current product in the $productList array
            $productList[$key]['product_data'] = $productData;
        }

        return view('pages.transaksi.detail.index', [
            'transactionData' => $transactionData,
            'productList' => $productList
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
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
