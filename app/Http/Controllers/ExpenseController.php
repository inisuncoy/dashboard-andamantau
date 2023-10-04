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
    public function index()
    {
        $token = session('token');

        $apiResponse = Http::withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/report/expenses");

        if ($apiResponse->failed()) {
            $errors = $apiResponse->json();
            return back()->withErrors($errors)->withInput();
        }

        $expensesData = $apiResponse->json()['data'];

        $collection = new Collection($expensesData);

        $perPage = 10; // Number of items per page
        $page = request()->get('page', 1); // Get the current page from the request
        $paginator = new LengthAwarePaginator(
            $collection->forPage($page, $perPage),
            $collection->count(),
            $perPage,
            $page,
            ['path' => route('pengeluaran.selengkapnya')] // Replace 'your.route.name' with the actual route name
        );

        $total_data = $paginator->total();

        $title = "Apakah anda yakin ingin menghapus pengeluaran ini dari daftar pengeluaran?";
        confirmDelete($title);

        return view('pages.pengeluaran.selengkapnya.index', [
            'expensesData' => $paginator,
            'total_data' => $total_data
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

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
            return back()->withErrors($errors)->withInput();
        }



        return redirect()->route('pengeluaran.selengkapnya');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
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
            return back()->withErrors($errors)->withInput();
        }

        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $token = session('token');

        $apiResponse = Http::withToken($token)->delete(config('backend.backend_url') . "/api/dashboard/umkm/report/expense/" . $id);

        if ($apiResponse->failed()) {
            return back()->with('delete_expense', 'failed');
        }

        return redirect('/pengeluaran/selengkapnya')->with('delete_expense', 'success');
    }
}
