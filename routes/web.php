<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CategoryHomeController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\LandingPageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewHomeController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\ServiceHomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VendorHomeController;
use App\Http\Controllers\SearchController;

Route::get('/', [LandingPageController::class, 'index']);

Route::resource('service_home', ServiceHomeController::class);
Route::resource('review_home', ReviewHomeController::class);
Route::resource('category_home', CategoryHomeController::class);
Route::resource('vendor_home', VendorHomeController::class);
Route::get('/search', [SearchController::class,'search'])->name('search');


Route::middleware(['auth'])->group(function () {
    Route::resource('dashboard', DashboardController::class);
    Route::resource('profile', ProfileController::class);

    Route::middleware(['auth', 'super_admin'])->group(function () {    
        Route::resource('kategori', CategoryController::class);
    });
    Route::resource('users', UserController::class);
    
    Route::resource('vendor', VendorController::class);
    Route::resource('service', ServiceController::class);
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
