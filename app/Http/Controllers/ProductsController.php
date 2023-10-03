<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Alert;
use Illuminate\Support\Facades\Storage;

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
        $token = session('token');

        $apiResponse = Http::withToken($token)->get(env('BACKEND_URL') . '/api/category/products');

        // dd($apiResponse->json());

        // if ($apiResponse->failed()) {
        //     $errors = $apiResponse->json();
        //     return back()->withErrors($errors)->withInput();
        // }

        // $categories = $apiResponse->json()['data'];

        return view('pages.produk.tambah.index', [
            // 'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $token = session('token');
        $fileData = [];

        // Cek dan mengunggah file1
        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $imageName = str_replace(' ', '', $file->getClientOriginalName());
            $file->storeAs('temp', $imageName, 'public');
            $filePath = storage_path('app/public/temp/' . $imageName);
            $fileData[] = [
                'name' => 'file1',
                'contents' => file_get_contents($filePath),
                'filename' => $imageName,
            ];
        }

        // Cek dan mengunggah file2, file3, file4, dan file5
        for ($i = 2; $i <= 5; $i++) {
            $fileInputName = 'file' . $i;
            if ($request->hasFile($fileInputName)) {
                $file = $request->file($fileInputName);
                $imageName = str_replace(' ', '', $file->getClientOriginalName());
                $file->storeAs('temp', $imageName, 'public');
                $filePath = storage_path('app/public/temp/' . $imageName);
                $fileData[] = [
                    'name' => $fileInputName,
                    'contents' => file_get_contents($filePath),
                    'filename' => $imageName,
                ];
            }
        }

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $imageName = str_replace(' ', '', $file->getClientOriginalName());
            $file->storeAs('temp', $imageName, 'public');
            $filePath = storage_path('app/public/temp/' . $imageName);

            if (!empty($fileData)) {
                $response = Http::withToken($token);
                
                foreach ($fileData as $fileItem) {
                    $response->attach(
                        'file',
                        file_get_contents($filePath),
                        $imageName
                    )->attach(
                        $fileItem['name'], 
                        $fileItem['contents'], 
                        $fileItem['filename']
                    );
                }
        
                $apiResponse  = $response->post(env('BACKEND_URL') . "/api/dashboard/umkm/product", [
                    'name' => $request->name,
                    'id_category_product' => $request->id_category_product,
                    'status' => $request->status,
                    'price' => $request->price,
                    'description' => $request->description,
                    'stock' => $request->stock,
                    'variant' => $request->variant,
                    'weight' => $request->weight,
                    'width' => $request->width,
                    'length' => $request->length,
                    'height' => $request->height,
                ]);
        
                dd($apiResponse->json());
            } else {
                $apiResponse = Http::attach(
                    'file',
                    file_get_contents($filePath),
                    $imageName
                )->withToken($token)->post(env('BACKEND_URL'). "/api/dashboard/umkm/product", [
                    'name' => $request->name,
                    'id_category_product' => $request->id_category_product,
                    'status' => $request->status,
                    'price' => $request->price,
                    'description' => $request->description,
                    'stock' => $request->stock,
                    'variant' => $request->variant,
                    'weight' => $request->weight,
                    'width' => $request->width,
                    'length' => $request->length,
                    'height' => $request->height,
                ]);
                dd($apiResponse->json());
            }
        } 
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