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

        $apiResponse = Http::withToken($token)->get(env('BACKEND_URL') . "/api/dashboard/umkm/transactions");
        $apiResponse2 = Http::withToken($token)->get(env('BACKEND_URL') . "/api/dashboard/umkm/transactionPaymentList");

        if ($apiResponse->failed() and $apiResponse2->failed()) {
            $errors = $apiResponse->json();
            return back()->withErrors($errors)->withInput();
        }

        $transactionsData = $apiResponse->json()['data'];
        $paymentTypes = $apiResponse2->json()['data'];

        return view('pages.transaksi.index', [
            'transactionsData' => $transactionsData,
            '$paymentTypes' => $paymentTypes
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

        $apiResponse = Http::withToken($token)->get(env('BACKEND_URL') . "/api/dashboard/umkm/transaction/" . $id);

        if ($apiResponse->failed()) {
            $errors = $apiResponse->json();
            return back()->withErrors($errors)->withInput();
        }

        $transactionData = $apiResponse->json()['data'];

        foreach ($transactionData['product_list'] as $product) {
            $idProduct = $product['id_product'];

            $productResponse = Http::withToken($token)->get('https://api.andamantau.com/api/product/' . $idProduct);
            $product['detail_product'] = $productResponse->json()['data'];


            // Add the product data to the current product in the $productList array
            $productList[] = $product;
        }
        // dd($productList);
        // dd($transactionData);

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
