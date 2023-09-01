<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LandingPageController;

Route::get('/', [LandingPageController::class, 'index']);
Route::middleware(['auth'])->group(function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('kategori', CategoryController::class);
    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});
Auth::routes();
Route::get('/home', [HomeController::class, 'index'])->name('home');

// Keperluan Acara
// Carering dan restoran kecil
// Souvenir
// UMKM Dekorasi Tenda
// Sound Sistem

// Desain dan percetakan
// Desain grafis/percetakan digital
// Desain Kartu undangan
// Desain produk

// Kreativitas
// jasa kerajinan
// Bordir
// Sablon
// Desain Bucker
// Jahit

// Layanan Rumah tangga
// laundry
// cleaning service
// perbaikan dan pemeliharaan r umah
// jasa angkut barang
// jasa tukang kebun

// kecantikan dan perawatan
// barber shop
// salon
// bridal
// nail art
// extention

// Teknologi dan komunikasi
// service hp
// service laptop dan komputer
// service elektronik
