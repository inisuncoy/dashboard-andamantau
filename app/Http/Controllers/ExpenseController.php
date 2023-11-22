<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;
use Alert;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if (session('RTO') == 'error') {
            Alert::toast('Request Time Out!', 'error');
        }

        try {

            if (session('store_pengeluaran') == 'success') {
                Alert::success('Berhasil', 'Pengeluaran telah dibuat')->autoClose(4000);
            }

            if (session('destroy_pengeluaran') == 'success') {
                Alert::success('Berhasil', 'Pengeluaran berhasil dihapus')->autoClose(4000);
            }

            if (session('destroy_pengeluaran') == 'failed') {
                Alert::error('Error', 'Gagal menghapus pengeluaran!')->autoClose(4000);
            }

            $title = "Apakah anda yakin ingin menghapus pengeluaran ini dari daftar pengeluaran?";
            confirmDelete($title);

            $token = session('token');
            $query = $request->query('bulan');
            $page = request()->get('page', 1);


            if ($query) {
                $apiResponse = Http::withToken($token)->post(config('backend.backend_url') . "/api/dashboard/umkm/report/expensesMonth", [
                    'bulan' => $query
                ]);

                if ($apiResponse->failed()) {
                    $errors = $apiResponse->json();
                    return back()->withErrors($errors)->withInput();
                }

                $expenses = $apiResponse->json()['data'];

                return view('pages.pengeluaran.selengkapnya.index', [
                    'expensesData' => $expenses,
                ]);
            } else {
                $apiResponse = Http::withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/report/expenses?page=" . $page);

                if ($apiResponse->failed()) {
                    $errors = $apiResponse->json();
                    return back()->withErrors($errors)->withInput();
                }

                $expenses = $apiResponse->json()['data'];

                $paginatedPlaces = new LengthAwarePaginator(
                    $expenses['data'],
                    $expenses['total'],
                    $expenses['per_page'],
                    $page,
                    ['path' => route('pengeluaran.selengkapnya')]
                );

                return view('pages.pengeluaran.selengkapnya.index', [
                    'expensesData' => $expenses,
                    'paginatedPlaces' => $paginatedPlaces
                ]);
            }
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
        if (session('store_pengeluaran') == 'failed') {
            Alert::error('Gagal', 'Pengeluaran Gagal dibuat')->autoClose(4000);
        }

        return view('pages.pengeluaran.tambah.index');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $token = session('token');

        $apiResponse = Http::withToken($token)->post(config('backend.backend_url') . "/api/dashboard/umkm/report/expense", $request->all());

        if ($apiResponse->failed()) {
            $errors = $apiResponse->json();
            return back()->withErrors($errors)->withInput()->with(['store_pengeluaran' => 'failed']);
        }

        return redirect()->route('pengeluaran.selengkapnya')->with(['store_pengeluaran' => 'success']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if (session('edit_pengeluaran') == 'success') {
            Alert::success('Berhasil', 'Pengeluaran telah diupdate')->autoClose(4000);
        }

        if (session('edit_pengeluaran') == 'failed') {
            Alert::error('Error', 'Gagal mengupdate pengeluaran')->autoClose(4000);
        }

        $token = session('token');

        $apiResponse = Http::withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/report/expense/" . $id);

        if ($apiResponse->failed()) {
            $errors = $apiResponse->json();
            return back()->withErrors($errors)->withInput();
        }

        $expenseData = $apiResponse->json()['data'];

        return view('pages.pengeluaran.detail.index', [
            'expenseData' => $expenseData,
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

        $apiResponse = Http::withToken($token)->post(config('backend.backend_url') . "/api/dashboard/umkm/report/expense/" . $id,  $request->all());

        if ($apiResponse->failed()) {
            $errors = $apiResponse->json();
            return back()->withErrors($errors)->with(['edit_pengeluaran' => 'failed']);
        }

        return back()->with(['edit_pengeluaran' => 'success']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $token = session('token');

        $apiResponse = Http::withToken($token)->delete(config('backend.backend_url') . "/api/dashboard/umkm/report/expense/" . $id);

        if ($apiResponse->failed()) {
            return back()->with(['destroy_pengeluaran' => 'failed']);
        }

        return redirect('/pengeluaran/selengkapnya')->with(['destroy_pengeluaran' => 'success']);
    }
}
