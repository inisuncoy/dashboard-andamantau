<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\IncomeController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ExpenseController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProfileWebController;
use App\Http\Controllers\TransactionController;
use Illuminate\Auth\Notifications\ResetPassword;
use App\Http\Controllers\ResetPasswordController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\IncomeDashboardController;
use App\Http\Controllers\OTPVerificationController;
use App\Http\Controllers\ReportDashboardController;
use App\Http\Controllers\ExpenseDashboardController;
use App\Http\Controllers\TransactionFakturController;

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


Route::get('/login', [LoginController::class, 'index'])->name('login');
Route::post('/login', [LoginController::class, 'store']);

Route::get('/lupa-sandi', [ForgotPasswordController::class, 'index']);
Route::post('/lupa-sandi', [ForgotPasswordController::class, 'store']);

Route::get('/lupa-sandi/verifikasi-otp', [OTPVerificationController::class, 'index']);
Route::post('/lupa-sandi/verifikasi-otp', [OTPVerificationController::class, 'store']);

Route::get('/reset-password', [ResetPasswordController::class, 'index']);
Route::post('/reset-password', [ResetPasswordController::class, 'store']);

Route::get('/logout', [LogoutController::class, 'store']);

Route::group(['middleware' => 'auth'], function () {
    Route::get('/', function () {
        return view("pages.welcome.index");
    });

    Route::get('/dashboard', [DashboardController::class, 'index']);

    Route::get('/transaksi{page?}', [TransactionController::class, 'index'])->name('transaksi');
    Route::get('/transaksi/{id}/detail', [TransactionController::class, 'show']);
    Route::get('/transaksi/{id}/faktur', [TransactionFakturController::class, 'show']);

    Route::get('/profil-toko', [ProfileWebController::class, 'index']);
    Route::get('/profil-toko/edit', [ProfileWebController::class, 'edit']);
    Route::post('/profil-toko/edit/update', [ProfileWebController::class, 'update']);

    Route::get('/produk', [ProductsController::class, 'index'])->name('produk');
    Route::get('/produk/tambah', [ProductsController::class, 'create']);
    Route::post('/produk/tambah', [ProductsController::class, 'store']);
    Route::get('/produk/{id}/edit', [ProductsController::class, 'edit']);
    Route::post('/produk/{id}/edit', [ProductsController::class, 'update']);
    Route::delete('/produk/{id}/delete', [ProductsController::class, 'destroy']);


    Route::get('/pemasukan', [IncomeDashboardController::class, 'index']);

    Route::get('/pemasukan/selengkapnya', [IncomeController::class, 'index'])->name('pemasukan.selengkapnya');
    Route::get('/pemasukan/{id}/detail', [IncomeController::class, 'show']);
    Route::get('/pemasukan/tambah', [IncomeController::class, 'create']);

    Route::get('/pengeluaran', [ExpenseDashboardController::class, 'index']);

    Route::get('/pengeluaran/selengkapnya', [ExpenseController::class, 'index'])->name('pengeluaran.selengkapnya');
    Route::get('/pengeluaran/tambah', [ExpenseController::class, 'create']);
    Route::post('/pengeluaran/tambah', [ExpenseController::class, 'store']);
    Route::get('/pengeluaran/{id}/detail', [ExpenseController::class, 'show']);
    Route::post('/pengeluaran/{id}/edit', [ExpenseController::class, 'update']);
    Route::delete('/pengeluaran/{id}/delete', [ExpenseController::class, 'destroy']);

    Route::get('/laporan', [ReportDashboardController::class, 'index']);

    Route::get('/blog', [BlogController::class, 'index'])->name('blog');
    Route::get('/blog/tambah', [BlogController::class, 'create']);
    Route::post('/blog/tambah', [BlogController::class, 'store']);
    Route::get('/blog/{id}/edit', [BlogController::class, 'edit']);
    Route::post('/blog/{id}/edit', [BlogController::class, 'update']);
});
