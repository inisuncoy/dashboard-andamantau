<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Alert;
use Illuminate\Support\Collection;
use Illuminate\Pagination\LengthAwarePaginator;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        if (session('store_news') == 'success') {
            Alert::success('Berita berhasil dibuat');
        }

        $token = session('token');

        $apiResponse = Http::withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/news");

        if ($apiResponse->failed()) {
            $errors = $apiResponse->json();
            return back()->withErrors($errors)->withInput();
        }

        $newsDatas = $apiResponse->json()['data'];

        $collection = new Collection($newsDatas);

        $perPage = 9; // Number of items per page
        $page = request()->get('page', 1); // Get the current page from the request
        $paginator = new LengthAwarePaginator(
            $collection->forPage($page, $perPage),
            $collection->count(),
            $perPage,
            $page,
            ['path' => route('blog')] // Replace 'your.route.name' with the actual route name
        );

        return view('pages.blog.index', [
            'newsDatas' => $paginator
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (session('store_news') == 'failed') {
            Alert::error('Gagal Membuat Berita!');
        }

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
        $token = session('token');

        if (session('create_blog') == 'failed') {
            Alert::success('Produk gagal dibuat!');
        }

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

        $labelDatas = [
            'id_label_news' => $request->id_label_news
        ];


        $apiResponse = $apiResponse->post(config('backend.backend_url') . '/api/dashboard/umkm/news', [
            'title' => $request->title,
            'id_category_news' => $request->id_category_news,
            'content' => $request->content,
        ]);

        if ($apiResponse->failed()) {
            $errors = $apiResponse->json();
            return back()->with('store_news', 'failed')->withErrors($errors)->withInput();
        }

        $apiResponse2 = Http::withToken($token)->withBody(json_encode($labelDatas))->post(config('backend.backend_url') . '/api/dashboard/umkm/news/' . $apiResponse->json()['data']['id']);

        if ($apiResponse2->failed()) {
            $errors = $apiResponse2->json();
            return back()->with('store_news', 'failed')->withErrors($errors)->withInput();
        }

        return redirect('/blog')->with('store_news', 'success');
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
        if (session('update_news') == 'failed') {
            Alert::error('Berita gagal dirubah!');
        }

        if (session('update_news') == 'success') {
            Alert::success('Berita berhasil dirubah!');
        }

        $token = session('token');

        $apiResponse = Http::withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/news/" . $id);
        $apiResponse2 = Http::withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/newsLabel");
        $apiResponse3 = Http::withToken($token)->get(config('backend.backend_url') . "/api/dashboard/umkm/newsCategory");

        if ($apiResponse->failed() and $apiResponse2->failed() and $apiResponse3->failed()) {
            $errors = $apiResponse->json();
            return back()->withErrors($errors)->withInput();
        }

        $labels = $apiResponse2->json()['data'];
        $categories = $apiResponse3->json()['data'];

        $blogData = $apiResponse->json()['data'];

        return view('pages.blog.edit.index', [
            'blogData' => $blogData,
            'labels' => $labels,
            'categories' => $categories
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

        $labelDatas = [
            'id_label_news' => $request->id_label_news
        ];

        $apiResponse = $apiResponse->post(config('backend.backend_url') . '/api/dashboard/umkm/news/' . $id, [
            'title' => $request->title,
            'id_category_news' => $request->id_category_news,
            'content' => $request->content,
        ]);

        if ($apiResponse->failed()) {
            $errors = $apiResponse->json();
            return back()->with('update_news', 'failed')->withErrors($errors);
        }

        $apiResponse2 = Http::withToken($token)->withBody(json_encode($labelDatas))->post(config('backend.backend_url') . '/api/dashboard/umkm/news/' . $id);

        if ($apiResponse2->failed()) {
            return back()->with('update_news', 'failed');
        }

        return back()->with('update_news', 'success');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
