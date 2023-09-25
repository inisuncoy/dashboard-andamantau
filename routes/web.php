<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\DashboarController;
use App\Http\Controllers\ProfileWebController;

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

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', [DashboarController::class, 'index']);

    Route::get('/laporan', function () {
        return view('pages.laporan.index');
    });

    Route::get('/pengeluaran', function () {
        return view('pages.pengeluaran.index');
    });

    Route::get('/pengeluaran/tambah', function () {
        return view('pages.pengeluaran.tambah.index');
    });

    Route::get('/pemasukan', function () {
        return view('pages.pemasukan.index');
    });

    Route::get('/pemasukan/tambah', function () {
        return view('pages.pemasukan.tambah.index');
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


    Route::get('/profil-web', [ProfileWebController::class, 'index']);
    Route::get('/profil-web/edit', [ProfileWebController::class, 'edit']);

    Route::get('/produk/edit', function () {
        return view('pages.produk.edit.index');
    });

    Route::get('/produk', function () {
        return view('pages.produk.index');
    });

    Route::get('/produk/tambah', function () {
        return view('pages.produk.tambah.index');
    });
});

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'store']);

Route::get('/logout', [LogoutController::class, 'store']);
