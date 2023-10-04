<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Alert;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $token = session('token');

        $apiResponse = Http::withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/news");

        if ($apiResponse->failed()) {
            $errors = $apiResponse->json();
            return back()->withErrors($errors)->withInput();
        }

        $newsDatas = $apiResponse->json()['data'];

        return view('pages.blog.index', [
            'newsDatas' => $newsDatas
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $token = session('token');

        $apiResponse = Http::withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/newsLabel");
        $apiResponse2 = Http::withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/newsCategory");

        if ($apiResponse->failed() and $apiResponse2->failed()) {
            $errors = $apiResponse->json();
            return back()->withErrors($errors)->withInput();
        }

        $labels = $apiResponse->json()['data'];
        $categories = $apiResponse2->json()['data'];


        return view('pages.blog.tambah.index', [
            'labels' => $labels,
            'categories' => $categories
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if (session('create_blog') == 'failed') {
            Alert::success('Produk gagal dibuat!');
        }

        $token = session('token');

        $apiResponse = Http::withToken($token);

        if ($request->hasFile('file')) {
            $file = $request->file('file');
            $imageName = str_replace(' ', '', $file->getClientOriginalName());
            $file->storeAs('temp', $imageName, 'public');
            $filePath = storage_path('app/public/temp/' . $imageName);
            // dd($request->all());

            $apiResponse = $apiResponse->attach(
                'file',
                file_get_contents($filePath),
                $imageName
            );
        }

        $requestedData = [
            'title' => $request->title,
            'id_category_news' => $request->id_category_news,
            'content' => $request->content,
            'id_label_news' => $request->id_label_news,
        ];

        $apiResponse = $apiResponse->withBody(json_encode($requestedData))->post(config('backend.backend_url') . '/api/dashboard/umkm/news');
        if ($apiResponse->failed()) {

            return back()->with('create_blog', 'failed');
        }

        return redirect('/blog')->with('create_blog', 'success');
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
        return view('pages.blog.edit.index');
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
