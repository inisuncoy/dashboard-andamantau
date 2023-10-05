<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class TransactionFakturController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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

        $apiResponse = Http::withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/transaction/" . $id);

        $apiResponse2 = Http::withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/transactionPaymentList");

        if ($apiResponse->failed() and $apiResponse2->failed()) {
            $errors = $apiResponse->json();
            return back()->withErrors($errors)->withInput();
        }

        $transactionData = $apiResponse->json()['data'];
        $paymentList = $apiResponse2->json()['data'];


        foreach ($transactionData['product_list'] as $product) {
            $idProduct = $product['id_product'];

            $productResponse = Http::withToken($token)->get(config('backend.backend_url') . '/api/product/' . $idProduct);
            $product['detail_product'] = $productResponse->json()['data'];

            $productList[] = $product;
        }


        return view('pages.transaksi.detail.Faktur.index', [
            'transactionData' => $transactionData,
            'productList' => $productList,
            'paymentList' => $paymentList
        ]);
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
