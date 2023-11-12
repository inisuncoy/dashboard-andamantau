<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $token = session('token');
        $page = request()->get('page', 1);

        try {
            $apiResponse = Http::withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/transactions?page=" . $page);
            $apiResponse2 = Http::withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/transactionPaymentList");

            if ($apiResponse->failed() || $apiResponse2->failed()) {
                $errors = $apiResponse->json();
                return back()->withErrors($errors);
            }

            $transactions = $apiResponse->json()['data'];
            $paymentTypes = $apiResponse2->json()['data'];

            $paginatedPlaces = new LengthAwarePaginator(
                $transactions['data'],
                $transactions['total'],
                $transactions['per_page'],
                $page,
                ['path' => route('transaksi')]
            );
        } catch (RequestException $e) {
            Log::error('HTTP request failed: ' . $e->getMessage());
        } catch (ClientException $e) {
            Log::error('Client error: ' . $e->getMessage());
        } catch (ServerException $e) {
            Log::error('Server error: ' . $e->getMessage());
        } catch (Exception $e) {
            Log::error('An unexpected error occurred: ' . $e->getMessage());
        }

        return view('pages.transaksi.index', [
            'transactions' => $transactions,
            '$paymentTypes' => $paymentTypes,
            'paginatedPlaces' => $paginatedPlaces
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

        $apiResponse = Http::withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/transaction/" . $id);

        if ($apiResponse->failed()) {
            $errors = $apiResponse->json();
            return back()->withErrors($errors)->withInput();
        }

        $transactionData = $apiResponse->json()['data'];

        $productList = [];

        foreach ($transactionData['product_list'] as $product) {
            $idProduct = $product['id_product'];

            $productResponse = Http::withToken($token)->get(config('backend.backend_url') . '/api/product/' . $idProduct);
            $product['detail_product'] = $productResponse->json()['data'];

            $productList[] = $product;
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
