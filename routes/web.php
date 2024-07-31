<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DanhMucController;
use App\Http\Controllers\SanPhamController;
use App\Http\Controllers\DonHangController;
use App\Http\Controllers\ChiTietDonHangController;
use App\Http\Controllers\TrangThaiDonHangController;
use App\Http\Controllers\UserController;

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
    return view('welcome');
});

// Route resource
Route::resource('sanpham', SanPhamController::class);

Route::resource('danhmuc', DanhMucController::class);

Route::resource('user', UserController::class);

Route::resource('donhang', DonHangController::class);

Route::resource('chitietdonhang', ChiTietDonHangController::class);

Route::resource('trangthaidonhang', TrangThaiDonHangController::class);

Route::resource('dashboard', DashboardController::class);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
