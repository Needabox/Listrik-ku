<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DayaController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\TagihanController;
use App\Http\Controllers\PelangganController;
use App\Http\Controllers\AdminLoginController;
use App\Http\Controllers\PembayaranController;
use App\Http\Controllers\AdminRegisterController;
use App\Http\Controllers\RegistPenggunaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(); 

//Login Admin
Route::get('/login/admin', [AdminLoginController::class, 'adminLoginForm'])->name('adminForm');
Route::post('/login/admin', [AdminLoginController::class,'adminLogin'])->name('adminLogin');
Route::get('/register/admin', [AdminRegisterController::class,'adminRegisterForm'])->name('adminRegist');
Route::post('/register/admin', [AdminRegisterController::class,'createAdmin'])->name('adminCreate');
Route::get('/logout/admin', [AdminLoginController::class, 'logout'])->name('logoutAdmin');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => 'auth'], function () {
    Route::get('/pelanggan', [PelangganController::class, 'index'])->name('pelanggan');

    //Success
    Route::get('/success/{id}', [PembayaranController::class, 'success'])->name('success');
    Route::get('/cetak/{id}', [PembayaranController::class, 'cetak'])->name('cetak');

    //Pembayaran
    Route::get('/pembayaran', [PembayaranController::class, 'index'])->name('pembayaran');
    Route::get('/bayar/{id}', [PembayaranController::class, 'bayar'])->name('bayar');
    Route::post('/bayar/store/{id}', [PembayaranController::class, 'update'])->name('pembayaran.store');
});

Route::group(['middleware' => 'auth:admin'], function () {
    //admin
    Route::get('/admin', [AdminController::class, 'index'])->name('admin');
    
    //Daya
    Route::get('/daya', [DayaController::class, 'index'])->name('daya');
    Route::post('/daya/store', [DayaController::class, 'store'])->name('daya.store');
    Route::get('/daya/edit/{id}', [DayaController::class, 'edit'])->name('daya.edit');
    Route::post('/daya/update/{id}', [DayaController::class, 'update'])->name('daya.update');
    Route::get('/daya/delete/{id}', [DayaController::class, 'destroy'])->name('daya.delete');

    //Tagihan
    Route::get('/tagihan', [TagihanController::class, 'index'])->name('tagihan');
    Route::post('/tagihan/store', [TagihanController::class, 'store'])->name('tagihan.store');
    Route::get('/tagihan/edit/{id}', [TagihanController::class, 'edit'])->name('tagihan.edit');
    Route::post('/tagihan/update/{id}', [TagihanController::class, 'update'])->name('tagihan.update');
    Route::get('/tagihan/delete/{id}', [TagihanController::class, 'destroy'])->name('tagihan.delete');

});
