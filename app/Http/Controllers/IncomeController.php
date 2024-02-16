<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;
use Alert;

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

        if (session('store_pemasukan') == 'success') {
            Alert::success('Berhasil', 'Pemasukan telah dibuat')->autoClose(4000);
        }

        $title = "Apakah anda yakin ingin menghapus pemasukan ini dari daftar pemasukan?";
        confirmDelete($title);

        $token = session('token');
        $page = request()->get('page', 1);

        $apiResponse = Http::withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/report/incomes?page=" . $page);

        $incomes = $apiResponse->json()['data'];

        $paginatedPlaces = new LengthAwarePaginator(
            $incomes['data'],
            $incomes['total'],
            $incomes['per_page'],
            $page,
            ['path' => route('pemasukan.selengkapnya')],
        );


        return view('pages.pemasukan.selengkapnya.index', [
            'incomes' => $incomes,
            'paginatedPlaces' => $paginatedPlaces
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (session('validation_store_pemasukan') == 'error') {
            Alert::error('Gagal Membuat Pemasukan!', 'Terdapat data yang tidak valid. Cek kembali data yang dimasukkan.');
        }

        $token = session('token');
        $apiResponse = Http::withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/report/paymentList");
        $paymentTypes = $apiResponse->json()['data'];

        return view('pages.pemasukan.tambah.index', [
            'paymentTypes'=> $paymentTypes
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $token = session('token');

        $apiResponse = Http::acceptJson()->withToken($token)->post(config('backend.backend_url') . "/api/dashboard/umkm/report/income", $request->all());

        if ($apiResponse->unprocessableEntity()) {
            $errors = $apiResponse->json();
            return back()->with('validation_store_pemasukan', 'error')->withErrors($errors['errors'])->withInput();
        }

        if ($apiResponse->failed()) {
            $errors = $apiResponse->json();
            return back()->with('store_pemasukan', 'error')->withInput();
        }

        return redirect()->route('pemasukan.selengkapnya')->with(['store_pemasukan' => 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (session('update_pemasukan') == 'success') {
            Alert::success('Berhasil', 'Pemasukan telah diupdate')->autoClose(4000);
        }

        if (session('update_pemasukan') == 'failed') {
            Alert::error('Error', 'Gagal mengupdate pemasukan')->autoClose(4000);
        }

        if (session('APIFailed')) {
            Alert::toast(session('APIFailed'), 'error');
        }

        if (session('validation_update_pemasukan') == 'error') {
            Alert::error('Gagal Membuat Pemasukan!', 'Terdapat data yang tidak valid. Cek kembali data yang dimasukkan.');
        }

        $token = session('token');

        $apiResponse = Http::withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/report/income/" . $id);

        $apiResponse2 = Http::withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/report/paymentList");

        if ($apiResponse->failed() and $apiResponse2->failed()) {
            $errors = $apiResponse->json();
            return back()->withErrors($errors);
        }

        $incomeData = $apiResponse->json()['data'];
        $incomeTypes = $apiResponse2->json()['data'];


        return view('pages.pemasukan.detail.index', [
            'incomeData' => $incomeData,
            'incomeTypes' => $incomeTypes
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
        $token = session('token');

        $apiResponse = Http::acceptJson()->withToken($token)->post(config('backend.backend_url') . "/api/dashboard/umkm/report/income/" . $id, $request->all());

        if ($apiResponse->unprocessableEntity()) {
            $errors = $apiResponse->json();
            return back()->with('validation_update_pemasukan', 'error')->withErrors($errors['errors'])->withInput();
        }

        if ($apiResponse->failed()) {
            $errors = $apiResponse->json();
            return back()->with('update_pemasukan', 'error')->withInput();
        }

        return back()->with(['update_pemasukan' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $token = session('token');

        $apiResponse = Http::withToken($token)->delete(config('backend.backend_url') . "/api/dashboard/umkm/report/income/" . $id);

        if ($apiResponse->failed()) {
            return back()->with(['destroy_pemasukan' => 'failed']);
        }

        return redirect('/pemasukan/selengkapnya')->with(['destroy_pemasukan' => 'success']);
    }
}
