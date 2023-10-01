<?php

use App\Http\Controllers\BlogController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProfileWebController;
use App\Http\Controllers\TransactionController;
use App\Http\Controllers\IncomeDashboardController;
use App\Http\Controllers\ReportDashboardController;
use App\Http\Controllers\ExpenseDashboardController;

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
    Route::get('/', [DashboardController::class, 'index']);

    Route::get('/transaksi', [TransactionController::class, 'index']);
    Route::get('/transaksi/{id}/detail', [TransactionController::class, 'show']);

    Route::get('/profil-toko', [ProfileWebController::class, 'index']);
    Route::get('/profil-toko/edit', [ProfileWebController::class, 'edit']);
    Route::post('/profil-toko/edit/update', [ProfileWebController::class, 'update']);

    Route::get('/produk', [ProductsController::class, 'index']);
    Route::get('/produk/tambah', [ProductsController::class, 'create']);
    Route::post('/produk/tambah', [ProductsController::class, 'store']);
    Route::get('/produk/{id}/edit', [ProductsController::class, 'edit']);
    Route::delete('/produk/{id}/delete', [ProductsController::class, 'destroy']);


    Route::get('/pemasukan', [IncomeDashboardController::class, 'index']);

    Route::get('/pemasukan/selengkapnya', [IncomeController::class, 'index'])->name('pemasukan.selengkapnya');
    Route::get('/pemasukan/tambah', [IncomeController::class, 'create']);

    Route::get('/pengeluaran', [ExpenseDashboardController::class, 'index']);

    Route::get('/pengeluaran/selengkapnya', [ExpenseController::class, 'index'])->name('pengeluaran.selengkapnya');
    Route::get('/pengeluaran/tambah', [ExpenseController::class, 'create']);
    Route::get('/pengeluaran/{id}/detail', [ExpenseController::class, 'show']);
    Route::get('/pengeluaran/{id}/delete', [ExpenseController::class, 'destroy']);

    Route::get('/laporan', [ReportDashboardController::class, 'index']);

    Route::get('/blog', [BlogController::class, 'index']);
    Route::get('/blog/tambah', [BlogController::class, 'create']);
    Route::get('/blog/edit', [BlogController::class, 'edit']);
});

Route::get('/login', [LoginController::class, 'index']);
Route::post('/login', [LoginController::class, 'store']);

Route::get('/logout', [LogoutController::class, 'store']);
