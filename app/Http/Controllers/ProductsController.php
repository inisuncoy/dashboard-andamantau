<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Alert;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        try {
            if (session('APIFailed')) {
                Alert::toast(session('APIFailed'), 'error');
            }

            if (session('delete_product') == 'success') {
                Alert::success('Produk berhasil dihapus');
            }

            if (session('store_product') == 'success') {
                Alert::success('Produk berhasil dibuat');
            }

            $token = session('token');
            $page = request()->get('page', 1);

            $apiResponse = Http::withToken($token);

            $queryParams = [];

            if ($request->query('query')) {
                $queryParams['query'] = $request->query('query');
            }

            if ($request->query('sortByStock')) {
                $queryParams['sortByStock'] = $request->query('sortByStock');
            } elseif ($request->query('sortByPrice')) {
                $queryParams['sortByPrice'] = $request->query('sortByPrice');
            } elseif ($request->query('sortBySKU')) {
                $queryParams['sortBySKU'] = $request->query('sortBySKU');
            } elseif ($request->query('sortByName')) {
                $queryParams['sortByName'] = $request->query('sortByName');
            } elseif ($request->query('sortByStatus')) {
                $queryParams['sortByStatus'] = $request->query('sortByStatus');
            }

            $apiResponse = $apiResponse->post(config('backend.backend_url') . '/api/dashboard/umkm/sortByProducts?page=' . $page, $queryParams);

            if ($apiResponse->tooManyRequests()) {
                return back()->with('APIFailed', 'Terlalu banyak melakukan permintaan! Silahkan coba lagi');
            }

            if ($apiResponse->requestTimeout()) {
                return back()->with('APIFailed', 'Request timeout.');
            }

            if ($apiResponse->failed()) {
                return back()->with('APIFailed', 'Terjadi kesalahan di sistem. Silahkan hubungi admin jika masih terjadi kesalahan.');
            }

            $products = $apiResponse->json()['data'];

            $paginatedPlaces = new LengthAwarePaginator(
                $products['data'],
                $products['total'],
                $products['per_page'],
                $page,
                ['path' => route('produk')],
            );

            // Alert::success('Success Title', 'Success Message');

            return view('pages.produk.index', [
                'products' => $products,
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
        try {
            if (session('APIFailed')) {
                Alert::toast(session('APIFailed'), 'error');
            }

            if (session('validation_store_product') == 'error') {
                Alert::error('Gagal Membuat Produk!', 'Terdapat data yang tidak valid. Cek kembali data yang dimasukkan.');
            }

            if (session('store_product') == 'error') {
                Alert::error('Gagal Membuat Produk!', 'Terjadi kesalahan di sistem. Silahkan hubungi admin jika masih terjadi kesalahan.');
            }

            $token = session('token');

            $apiResponse = Http::withToken($token)->get(config('backend.backend_url') . '/api/dashboard/umkm/productCategory');

            if ($apiResponse->tooManyRequests()) {
                return redirect('/produk')->with('APIFailed', 'Terlalu banyak melakukan permintaan! Silahkan coba lagi');
            }

            if ($apiResponse->requestTimeout()) {
                return redirect('/produk')->with('APIFailed', 'Request timeout.');
            }

            if ($apiResponse->failed()) {
                return redirect('/produk')->with('APIFailed', 'Terjadi kesalahan di sistem. Silahkan hubungi admin jika masih terjadi kesalahan.');
            }

            $apiResponse2 = Http::withToken($token)->get(config('backend.backend_url') . '/api/dashboard/umkm/productVariant');

            if ($apiResponse2->tooManyRequests()) {
                return redirect('/produk')->with('APIFailed', 'Terlalu banyak melakukan permintaan! Silahkan coba lagi');
            }

            if ($apiResponse2->requestTimeout()) {
                return redirect('/produk')->with('APIFailed', 'Request timeout.');
            }

            if ($apiResponse2->failed()) {
                return redirect('/produk')->with('APIFailed', 'Terjadi kesalahan di sistem. Silahkan hubungi admin jika masih terjadi kesalahan.');
            }

            $categories = $apiResponse->json()['data'];
            $variants = $apiResponse2->json()['data'];

            return view('pages.produk.tambah.index', [
                'categories' => $categories,
                'variants' => $variants,
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

    // /**
    //  * Store a newly created resource in storage.
    //  */
    public function store(Request $request)
    {
        try {
            $token = session('token');

            $apiResponse = Http::acceptJson()->withToken($token);

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

            $apiResponse = $apiResponse->post(config('backend.backend_url') . '/api/dashboard/umkm/product', [
                'name' => $request->name ?? "",
                'id_category_product' => $request->id_category_product ?? "",
                'status' => $request->status ?? "",
                'price' => $request->price ?? "",
                'description' => $request->description ?? "",
                'stock' => $request->stock ?? "",
                'weight' => $request->weight ?? "",
                'width' => $request->width ?? "",
                'length' => $request->length ?? "",
                'height' => $request->height ?? "",
                'variants' => $request->variants
            ]);

            if ($apiResponse->tooManyRequests()) {
                $errors = $apiResponse->json();
                return back()->with('APIFailed', 'Terlalu banyak melakukan permintaan! Silahkan coba lagi')->withInput();
            }

            if ($apiResponse->unprocessableEntity()) {
                $errors = $apiResponse->json();
                return back()->with('validation_store_product', 'error')->withErrors($errors['errors'])->withInput();
            }

            if ($apiResponse->failed()) {
                $errors = $apiResponse->json();
                return back()->with('store_product', 'error')->withInput();
            }

            return redirect('/produk')->with('store_product', 'success');
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
        try {
            if (session('APIFailed')) {
                Alert::toast(session('APIFailed'), 'error');
            }

            if (session('delete_product') == 'error') {
                Alert::error('Gagal Menghapus Produk!');
            }

            if (session('validation_update_product') == 'error') {
                Alert::error('Gagal Membuat Produk!', 'Terdapat data yang tidak valid. Cek kembali data yang dimasukkan.');
            }

            if (session('update_product') == 'error') {
                Alert::error('Gagal Membuat Produk!', 'Terdapat kesalahan di sistem. Silahkan hubungi admin jika masih terjadi kesalahan.');
            }

            if (session('update_product') == 'success') {
                Alert::success('Produk telah berhasil diubah!');
            }

            $token = session('token');

            $apiResponse = Http::withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/product/" . $id);

            if ($apiResponse->tooManyRequests()) {
                return redirect('/produk')->with('APIFailed', 'Terlalu banyak melakukan permintaan! Silahkan coba lagi');
            }

            if ($apiResponse->requestTimeout()) {
                return redirect('/produk')->with('APIFailed', 'Request timeout.');
            }

            if ($apiResponse->notFound() || $apiResponse->forbidden()) {
                return redirect('/produk')->with('APIFailed', 'Produk tidak ditemukan.');
            }

            if ($apiResponse->failed()) {
                return redirect('/produk')->with('APIFailed', 'Terdapat kesalahan di sistem. Silahkan hubungi admin jika masih terjadi kesalahan.');
            }

            $apiResponse2 = Http::withToken($token)->get(config('backend.backend_url') . '/api/dashboard/umkm/productCategory');

            if ($apiResponse2->tooManyRequests()) {
                return redirect('/produk')->with('APIFailed', 'Terlalu banyak melakukan permintaan! Silahkan coba lagi.');
            }

            if ($apiResponse2->requestTimeout()) {
                return redirect('/produk')->with('APIFailed', 'Request timeout.');
            }

            if ($apiResponse2->failed()) {
                return redirect('/produk')->with('APIFailed', 'Terdapat kesalahan di sistem. Silahkan hubungi admin jika masih terjadi kesalahan.');
            }

            $apiResponse3 = Http::withToken($token)->get(config('backend.backend_url') . '/api/dashboard/umkm/productVariant');

            if ($apiResponse3->tooManyRequests()) {
                return redirect('/produk')->with('APIFailed', 'Terlalu banyak melakukan permintaan! Silahkan coba lagi.');
            }

            if ($apiResponse3->requestTimeout()) {
                return redirect('/produk')->with('APIFailed', 'Request timeout.');
            }

            if ($apiResponse3->failed()) {
                return redirect('/produk')->with('APIFailed', 'Terdapat kesalahan di sistem. Silahkan hubungi admin jika masih terjadi kesalahan.');
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
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {

            $token = session('token');

            $apiResponse = Http::acceptJson()->withToken($token);

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

            $apiResponse = $apiResponse->post(config('backend.backend_url') . '/api/dashboard/umkm/product/' . $id, [
                'name' => $request->name ?? "",
                'id_category_product' => $request->id_category_product ?? "",
                'status' => $request->status ?? "",
                'price' => $request->price ?? "",
                'description' => $request->description ?? "",
                'stock' => $request->stock ?? "",
                'weight' => $request->weight ?? "",
                'width' => $request->width ?? "",
                'length' => $request->length ?? "",
                'height' => $request->height ?? "",
                'variants' => $request->variants
            ]);

            if ($apiResponse->tooManyRequests()) {
                return back()->with('APIFailed', 'Terlalu banyak melakukan permintaan! Silahkan coba lagi')->withInput();
            }

            if ($apiResponse->unprocessableEntity()) {
                $errors = $apiResponse->json();
                return back()->with('validation_update_product', 'error')->withErrors($errors['errors'])->withInput();
            }

            if ($apiResponse->notFound() || $apiResponse->forbidden()) {
                return redirect('/produk')->with('APIFailed', 'Produk tidak ditemukan.');
            }

            if ($apiResponse->failed()) {
                return back()->with('update_product', 'error')->withInput();
            }

            return back()->with('update_product', 'success');
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
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {

            $token = session('token');

            $apiResponse = Http::withToken($token)->delete(config('backend.backend_url') . "/api/dashboard/umkm/product/" . $id);

            if ($apiResponse->tooManyRequests()) {
                return back()->with('APIFailed', 'Terlalu banyak melakukan permintaan! Silahkan coba lagi');
            }

            if ($apiResponse->notFound() || $apiResponse->forbidden()) {
                return redirect('/produk')->with('APIFailed', 'Produk tidak ditemukan.');
            }

            if ($apiResponse->failed()) {
                return back()->with('delete_product', 'error');
            }

            return redirect('/produk')->with('delete_product', 'success');
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
}
