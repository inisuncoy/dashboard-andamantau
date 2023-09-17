<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('pages.dashboard.index');
});

Route::get('/blog', function () {
    return view('pages.blog.index');
});

Route::get('/tambah-blog', function () {
    return view('pages.blog.tambah.index');
});

Route::get('/edit-blog', function () {
    return view('pages.blog.edit.index');
});

Route::get('/transaksi', function () {
    return view('pages.transaksi.index');
});

Route::get('/transaksi/detail', function () {
    return view('pages.transaksi.detail.index');
});


Route::get('/profil-web', function () {
    return view('pages.profil-web.index');
});

Route::get('/produk', function () {
    return view('pages.produk.index');
});

Route::get('/produk/tambah', function () {
    return view('pages.produk.tambah.index');
});

Route::get('/login', function () {
    return view('pages.auth.login.index');
});