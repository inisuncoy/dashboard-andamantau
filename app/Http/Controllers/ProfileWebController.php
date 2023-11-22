<?php

namespace App\Http\Controllers;

use Alert;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ProfileWebController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            if (session('update_profil') == 'success') {
                Alert::success('Profile telah berhasil diganti.');
            }

            if (session('APIFailed')) {
                Alert::toast(session('APIFailed'), 'error');
            }

            $token = session('token');

            $apiResponse = Http::retry(3, 300)->withToken($token)->get(config('backend.backend_url') . '/api/dashboard/umkm/profile');

            if ($apiResponse->requestTimeout()) {
                return back()->with('APIFailed', 'Request timeout!');
            }

            if ($apiResponse->notFound()) {
                return back()->with('APIFailed', 'Profile tidak ditemukan.');
            }

            if ($apiResponse->failed()) {
                return back()->with('APIFailed', 'Terdapat kesalahan di sistem. Silahkan hubungi admin jika masih terjadi kesalahan.');
            }

            $umkmData = $apiResponse->json()['data'];

            return view('pages.profil-web.index', [
                'umkmData' => $umkmData,
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        try {
            if (session('validation_update_profil') == 'error') {
                Alert::error('Gagal Mengubah Profil!', 'Terdapat data yang tidak valid. Cek kembali data yang dimasukkan.');
            }

            if (session('update_profil') == 'error') {
                Alert::error('Gagal Mengubah Profil!', 'Terdapat kesalahan di sistem kami. Silahkan hubungi admin jika masih terjadi kesalahan.');
            }

            $token = session('token');

            $apiResponse = Http::withToken($token)->get(config('backend.backend_url') . '/api/dashboard/umkm/profile');

            if ($apiResponse->tooManyRequests()) {
                return redirect('/produk')->with('APIFailed', 'Terlalu banyak melakukan permintaan! Silahkan coba lagi');
            }

            if ($apiResponse->requestTimeout()) {
                return redirect('/profil-toko')->with('APIFailed', 'Request timeout!');
            }

            if ($apiResponse->notFound()) {
                return redirect('/profil-toko')->with('APIFailed', 'Profile tidak ditemukan.');
            }

            if ($apiResponse->failed()) {
                return redirect('/profil-toko')->with('APIFailed', 'Terdapat kesalahan di sistem. Silahkan hubungi admin jika masih terjadi kesalahan.');
            }


            $apiResponse2 = Http::withToken($token)->get(config('backend.backend_url') . '/api/dashboard/umkm/profileCities');

            if ($apiResponse2->tooManyRequests()) {
                return redirect('/profil-toko')->with('APIFailed', 'Terlalu banyak melakukan permintaan! Silahkan coba lagi');
            }

            if ($apiResponse2->requestTimeout()) {
                return redirect('/profil-toko')->with('APIFailed', 'Request timeout!');
            }

            if ($apiResponse2->failed()) {
                return redirect('/profil-toko')->with('APIFailed', 'Terdapat kesalahan di sistem. Silahkan hubungi admin jika masih terjadi kesalahan.');
            }

            $umkmCities = $apiResponse2->json()['data'];
            $umkmData = $apiResponse->json()['data'];

            return view('pages.profil-web.edit.index', [
                'umkmData' => $umkmData,
                'umkmCities' => $umkmCities
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
    public function update(Request $request)
    {
        try {
            $token = session('token');

            $data = [
                'umkm_name' => $request->umkm_name ?? "",
                'address' => $request->address ?? "",
                'id_city' => $request->id_city ?? "",
                'kecamatan' => $request->kecamatan ?? "",
                'kelurahan' => $request->kelurahan ?? "",
                'kode_pos' => $request->kode_pos ?? "",
                'instagram' => $request->instagram ?? "",
                'whatsapp' => $request->whatsapp ?? "",
                'facebook' => $request->facebook ?? "",
                'umkm_description' => $request->umkm_description ?? "",
                'phone_number' => $request->phone_number ?? "",
                'file' => $request->file ?? ""
            ];

            if ($request->hasFile('file')) {
                $file = $request->file('file');
                $imageName = str_replace(' ', '', $file->getClientOriginalName());
                $file->storeAs('temp/image/', $imageName, 'public');
                $filePath = storage_path('app/public/temp/image/' . $imageName);

                $apiResponse = Http::acceptJson()->attach(
                    'file',
                    file_get_contents($filePath),
                    $imageName
                )->withToken($token)->post(config('backend.backend_url') . '/api/dashboard/umkm/profile', $data);

                if ($apiResponse->successful()) {
                    unlink($filePath);
                    $request->session()->put('userData', $apiResponse->json()['data']);
                }
            } else {
                $apiResponse = Http::acceptJson()->withToken($token)->post(config('backend.backend_url') . '/api/dashboard/umkm/profile', $data);
                if ($apiResponse->successful()) {
                    $request->session()->put('userData', $apiResponse->json()['data']);
                }
            }

            if ($apiResponse->tooManyRequests()) {
                return back()->with('APIFailed', 'Terlalu banyak melakukan permintaan! Silahkan coba lagi')->withInput();
            }

            if ($apiResponse->requestTimeout()) {
                return back()->with('APIFailed', 'Request timeout!')->withInput();
            }

            if ($apiResponse->unprocessableEntity()) {
                $errors = $apiResponse->json();
                return back()->with('validation_update_profil', 'error')->withErrors($errors['errors'])->withInput();
            }

            if ($apiResponse->failed()) {
                $errors = $apiResponse->json();
                return back()->with('update_profil', 'error')->withInput();
            }

            return redirect('/profil-toko')->with('update_profil', 'success');
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
        //
    }
}
