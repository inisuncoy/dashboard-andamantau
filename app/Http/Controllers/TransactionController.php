<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;
use Alert;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            if (session('APIFailed')) {
                Alert::toast(session('APIFailed'), 'error');
            }

            $token = session('token');
            $page = request()->get('page', 1);

            $apiResponse = Http::withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/transactions?page=" . $page);

            if ($apiResponse->tooManyRequests()) {
                return back()->with('APIFailed', 'Terlalu banyak melakukan permintaan! Silahkan coba lagi');
            }

            if ($apiResponse->requestTimeout()) {
                return back()->with('APIFailed', 'Request timeout.');
            }

            if ($apiResponse->failed()) {
                return back()->with('APIFailed', 'Terjadi kesalahan di sistem. Silahkan hubungi admin jika masih terjadi kesalahan.');
            }

            $apiResponse2 = Http::withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/transactionPaymentList");

            if ($apiResponse2->tooManyRequests()) {
                return back()->with('APIFailed', 'Terlalu banyak melakukan permintaan! Silahkan coba lagi');
            }

            if ($apiResponse2->requestTimeout()) {
                return back()->with('APIFailed', 'Request timeout.');
            }

            if ($apiResponse2->failed()) {
                return back()->with('APIFailed', 'Terjadi kesalahan di sistem. Silahkan hubungi admin jika masih terjadi kesalahan.');
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
            return view('pages.transaksi.index', [
                'transactions' => $transactions,
                '$paymentTypes' => $paymentTypes,
                'paginatedPlaces' => $paginatedPlaces
            ]);
        } catch (RequestException $e) {
            Log::error('HTTP request failed: ' . $e->getMessage());
        } catch (ClientException $e) {
            Log::error('Client error: ' . $e->getMessage());
        } catch (ServerException $e) {
            Log::error('Server error: ' . $e->getMessage());
        } catch (Exception $e) {
            Log::error('An unexpected error occurred: ' . $e->getMessage());
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
        try {
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
        } catch (RequestException $e) {
            Log::error('HTTP request failed: ' . $e->getMessage());
        } catch (ClientException $e) {
            Log::error('Client error: ' . $e->getMessage());
        } catch (ServerException $e) {
            Log::error('Server error: ' . $e->getMessage());
        } catch (Exception $e) {
            Log::error('An unexpected error occurred: ' . $e->getMessage());
        }
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
