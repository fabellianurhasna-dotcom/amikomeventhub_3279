<?php

use Illuminate\Support\Facades\Route;

// Kumpulan Controller User
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TicketController;

// Kumpulan Controller Admin
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\PartnerController as AdminPartnerController;

/* --- RUTE DINAMIS PUBLIK --- */
// Rute utama yang mengambil data event dan partner secara dinamis (Soal 4)
Route::get('/', [HomeController::class, 'index'])->name('home');

/* --- RUTE HALAMAN STATIS USER --- */
Route::view('/profil', 'layout.profil')->name('profil');
Route::view('/katalog', 'layout.katalog')->name('katalog');
Route::view('/bantuan', 'layout.bantuan')->name('bantuan');
Route::view('/kontak', 'layout.kontak')->name('kontak');

/* --- RUTE DETAIL & TRANSAKSI --- */
Route::get('/ticket', [TicketController::class, 'show'])->name('ticket');
Route::view('/event/detail', 'layout.event-detail')->name('event.show');
Route::view('/checkout', 'layout.checkout')->name('checkout');


/* --- RUTE ADMIN PANEL --- */
Route::prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard Admin Utama
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // CRUD Resource Controller Event (Soal 1 & Soal 2)
    Route::resource('events', AdminEventController::class);

    // 🌟 SEKARANG SUDAH SATU: CRUD Resource Controller Kategori Penuh (Soal 3)
    Route::resource('categories', CategoryController::class);

    // Daftar Transaksi Admin
    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');
    
    // CRUD Resource Controller Partner Dinamis (Lanjutan Soal 4)
    Route::resource('partners', AdminPartnerController::class);
    
});