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

    public function index(Request $request)
    {
        if (session('delete_product') == 'success') {
            Alert::success('Produk berhasil dihapus');
        }

        if (session('store_product') == 'success') {
            Alert::success('Produk berhasil dibuat');
        }

        if (session('edit_product') == 'success') {
            Alert::success('Produk berhasil diedit');
        }


        $token = session('token');

        $apiResponse = Http::withToken($token)->get(config('backend.backend_url') . '/api/dashboard/umkm/products');

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
        if (session('store_product') == 'failed') {
            Alert::error('Gagal Membuat Product!');
        }

        $token = session('token');

        $apiResponse = Http::withToken($token)->get(config('backend.backend_url') . '/api/dashboard/umkm/productCategory');
        $apiResponse2 = Http::withToken($token)->get(config('backend.backend_url') . '/api/dashboard/umkm/productVariant');

        if ($apiResponse->failed() and $apiResponse2->failed()) {
            $errors = $apiResponse->json();
            return back()->withErrors($errors)->withInput();
        }

        $categories = $apiResponse->json()['data'];
        $variants = $apiResponse2->json()['data'];

        return view('pages.produk.tambah.index', [
            'categories' => $categories,
            'variants' => $variants,
        ]);
    }

    // /**
    //  * Store a newly created resource in storage.
    //  */
    public function store(Request $request)
    {
        $token = session('token');

        $apiResponse = Http::withToken($token);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $imageName = str_replace(' ', '', $file->getClientOriginalName());
            $file->storeAs('temp', $imageName, 'public');
            $filePath = storage_path('app/public/temp/' . $imageName);

            $apiResponse = $apiResponse->attach(
                'file',
                file_get_contents($filePath),
                $imageName
            );
        }

        if ($request->hasFile('file2')) {
            $file2 = $request->file('file2');
            $imageName2 = str_replace(' ', '', $file2->getClientOriginalName());
            $file2->storeAs('temp', $imageName2, 'public');
            $filePath2 = storage_path('app/public/temp/' . $imageName2);

            $apiResponse = $apiResponse->attach(
                'file2',
                file_get_contents($filePath2),
                $imageName2
            );
        }

        if ($request->hasFile('file3')) {
            $file3 = $request->file('file3');
            $imageName3 = str_replace(' ', '', $file3->getClientOriginalName());
            $file3->storeAs('temp', $imageName3, 'public');
            $filePath3 = storage_path('app/public/temp/' . $imageName3);

            $apiResponse = $apiResponse->attach(
                'file3',
                file_get_contents($filePath3),
                $imageName3
            );
        }

        if ($request->hasFile('file4')) {
            $file4 = $request->file('file4');
            $imageName4 = str_replace(' ', '', $file4->getClientOriginalName());
            $file4->storeAs('temp', $imageName4, 'public');
            $filePath4 = storage_path('app/public/temp/' . $imageName4);

            $apiResponse = $apiResponse->attach(
                'file4',
                file_get_contents($filePath4),
                $imageName4
            );
        }

        if ($request->hasFile('file5')) {
            $file5 = $request->file('file5');
            $imageName5 = str_replace(' ', '', $file5->getClientOriginalName());
            $file5->storeAs('temp', $imageName5, 'public');
            $filePath5 = storage_path('app/public/temp/' . $imageName5);

            $apiResponse = $apiResponse->attach(
                'file5',
                file_get_contents($filePath5),
                $imageName5
            );
        }

        $requestedData = [
            'name' => $request->name,
            'id_category_product' => $request->id_category_product,
            'status' => $request->status,
            'price' => $request->price,
            'description' => $request->description,
            'variants' => $request->variants,
            'stock' => $request->stock,
            'weight' => $request->weight,
            'width' => $request->width,
            'length' => $request->length,
            'height' => $request->height,
        ];

        $apiResponse = $apiResponse->withBody(json_encode($requestedData))->post(config('backend.backend_url') . '/api/dashboard/umkm/product');


        if ($apiResponse->failed()) {
            return back()->with('store_product', 'failed')->withInput();
        }

        return redirect('/produk')->with('store_product', 'success');
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
            session('delete_product')->flush();
        }
        $token = session('token');

        $apiResponse = Http::withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/product/" . $id);
        $apiResponse2 = Http::withToken($token)->get(config('backend.backend_url') . '/api/dashboard/umkm/productCategory');
        $apiResponse3 = Http::withToken($token)->get(config('backend.backend_url') . '/api/dashboard/umkm/productVariant');

        if ($apiResponse->failed() and $apiResponse2->failed() and $apiResponse3->failed()) {
            $errors = $apiResponse->json();
            return back()->withErrors($errors)->withInput();
        }

        $productData = $apiResponse->json()['data'];
        $categories = $apiResponse2->json()['data'];
        $variants = $apiResponse3->json()['data'];

        $title = "Apakah anda yakin ingin menghapus produk ini dari daftar produk?";
        confirmDelete($title);

        return view('pages.produk.edit.index', [
            'productData' => $productData,
            'categories' => $categories,
            'variants' => $variants,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $token = session('token');

        $apiResponse = Http::withToken($token);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $imageName = str_replace(' ', '', $file->getClientOriginalName());
            $file->storeAs('temp', $imageName, 'public');
            $filePath = storage_path('app/public/temp/' . $imageName);

            $apiResponse = $apiResponse->attach(
                'file',
                file_get_contents($filePath),
                $imageName
            );
        }

        if ($request->hasFile('file2')) {
            $file2 = $request->file('file2');
            $imageName2 = str_replace(' ', '', $file2->getClientOriginalName());
            $file2->storeAs('temp', $imageName2, 'public');
            $filePath2 = storage_path('app/public/temp/' . $imageName2);

            $apiResponse = $apiResponse->attach(
                'file2',
                file_get_contents($filePath2),
                $imageName2
            );
        }

        if ($request->hasFile('file3')) {
            $file3 = $request->file('file3');
            $imageName3 = str_replace(' ', '', $file3->getClientOriginalName());
            $file3->storeAs('temp', $imageName3, 'public');
            $filePath3 = storage_path('app/public/temp/' . $imageName3);

            $apiResponse = $apiResponse->attach(
                'file3',
                file_get_contents($filePath3),
                $imageName3
            );
        }

        if ($request->hasFile('file4')) {
            $file4 = $request->file('file4');
            $imageName4 = str_replace(' ', '', $file4->getClientOriginalName());
            $file4->storeAs('temp', $imageName4, 'public');
            $filePath4 = storage_path('app/public/temp/' . $imageName4);

            $apiResponse = $apiResponse->attach(
                'file4',
                file_get_contents($filePath4),
                $imageName4
            );
        }

        if ($request->hasFile('file5')) {
            $file5 = $request->file('file5');
            $imageName5 = str_replace(' ', '', $file5->getClientOriginalName());
            $file5->storeAs('temp', $imageName5, 'public');
            $filePath5 = storage_path('app/public/temp/' . $imageName5);

            $apiResponse = $apiResponse->attach(
                'file5',
                file_get_contents($filePath5),
                $imageName5
            );
        }

        $requestedData = [
            'name' => $request->name,
            'id_category_product' => $request->id_category_product,
            'status' => $request->status,
            'price' => $request->price,
            'description' => $request->description,
            'variants' => $request->variants,
            'stock' => $request->stock,
            'weight' => $request->weight,
            'width' => $request->width,
            'length' => $request->length,
            'height' => $request->height,
            'file3' => $request->file('file3'),
        ];

        $apiResponse = $apiResponse->withBody(json_encode($requestedData))->post(config('backend.backend_url') . '/api/dashboard/umkm/product/' . $id);

        if ($apiResponse->failed()) {
            return back()->with('edit_product', 'failed')->withInput();
        }

        return back()->with('edit_product', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $token = session('token');

        $apiResponse = Http::withToken($token)->delete(config('backend.backend_url') . "/api/dashboard/umkm/product/" . $id);

        if ($apiResponse->failed()) {
            return back()->with('delete_product', 'failed');
        }

        return redirect('/produk')->with('delete_product', 'success');
    }
}
