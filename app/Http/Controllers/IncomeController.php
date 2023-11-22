<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (session('RTO') == 'error') {
            Alert::toast('Request Time Out!', 'error');
        }

        $token = session('token');
        $apiResponse = Http::withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/report/incomes");
        $apiResponse2 = Http::withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/transactionPaymentList");
        $user_id = session('userData')['id'];

        if ($apiResponse->failed()) {
            $errors = $apiResponse->json();
            return back()->withErrors($errors)->withInput();
        }

        $incomesData = $apiResponse->json()['data'];
        $paymentTypes = $apiResponse2->json()['data'];

        $collection = new Collection($incomesData);

        $perPage = 10; // Number of items per page
        $page = request()->get('page', 1); // Get the current page from the request
        $paginator = new LengthAwarePaginator(
            $collection->forPage($page, $perPage),
            $collection->count(),
            $perPage,
            $page,
            ['path' => route('pemasukan.selengkapnya')] // Replace 'your.route.name' with the actual route name
        );

        return view('pages.pemasukan.selengkapnya.index', [
            'incomesData' => $paginator,
            'paymentTypes' => $paymentTypes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.pemasukan.tambah.index');
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


        return view('pages.pemasukan.detail.index', [
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
