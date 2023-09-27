<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Alert;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index()
    {
        if (session('delete_product') == 'success') {
            Alert::success('Produk berhasil dihapus');
        }

        $token = session('token');
        $user_id = session('userData')['id'];

        $apiResponse = Http::withToken($token)->post(env('BACKEND_URL') . '/api/products', [
            'id_user' => $user_id,
        ]);

        if ($apiResponse->failed()) {
            $errors = $apiResponse->json();
            return back()->withErrors($errors)->withInput();
        }

        $productsData = $apiResponse->json()['data'];

        // Alert::success('Success Title', 'Success Message');

        return view('pages.produk.index', [
            'productsData' => $productsData,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.produk.tambah.index');
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
        if (session('delete_product') == 'failed') {
            Alert::error('Gagal Menghapus Produk!');
        }
        $token = session('token');

        $apiResponse = Http::withToken($token)->get(env('BACKEND_URL') . "/api/product/" . $id);

        if ($apiResponse->failed()) {
            $errors = $apiResponse->json();
            return back()->withErrors($errors)->withInput();
        }

        $productData = $apiResponse->json()['data'];

        $title = "Apakah anda yakin ingin menghapus “" . $productData['name'] . "” dari daftar produk?";
        confirmDelete($title);

        return view('pages.produk.edit.index', [
            'productData' => $productData
        ]);
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
        $token = session('token');

        $apiResponse = Http::withToken($token)->delete(env('BACKEND_URL') . "/api/product/" . $id);

        if ($apiResponse->failed()) {
            return back()->with('delete_product', 'failed');
        }

        return redirect('/produk')->with('delete_product', 'success');
    }
}
