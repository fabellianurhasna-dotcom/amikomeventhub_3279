<?php

use Illuminate\Support\Facades\Route;

// ==========================================
// PANGGILAN CONTROLLER USER
// ==========================================
use App\Http\Controllers\HomeController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\TicketController;

// ==========================================
// PANGGILAN CONTROLLER ADMIN
// ==========================================
use App\Http\Controllers\Admin\DashboardController;
// Gunakan alias 'AdminEventController' agar tidak bentrok dengan EventController milik User
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\CategoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ==========================================
// RUTE HALAMAN STATIS (NAVBAR)
// ==========================================
// Kita gunakan nama rute (name) agar bisa dipanggil menggunakan route('nama_rute') di href navbar
Route::view('/profil', 'profil')->name('profil');
Route::view('/katalog', 'katalog')->name('katalog');
Route::view('/bantuan', 'bantuan')->name('bantuan');
Route::view('/kontak', 'kontak')->name('kontak');


// ==========================================
// RUTE SISI PENGGUNA (USER AREA)
// ==========================================
Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/event/1', [EventController::class, 'show'])->name('events.show');
Route::get('/checkout', [EventController::class, 'checkout'])->name('checkout');
Route::get('/my-ticket', [TicketController::class, 'show'])->name('ticket');


// ==========================================
// RUTE SISI ADMIN (ADMIN AREA)
// ==========================================
// Semua rute di dalam grup ini URL-nya akan diawali dengan '/admin'
// dan nama rutenya diawali dengan 'admin.'
Route::group(['prefix' => 'admin', 'as' => 'admin.'], function () {
    
    // URL: /admin  |  Nama Route: admin.dashboard
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    
    // URL: /admin/events  |  Nama Route: admin.events.index
    Route::get('/events', [AdminEventController::class, 'index'])->name('events.index');
    
    // URL: /admin/transactions  |  Nama Route: admin.transactions.index
    Route::view('/transactions', 'admin.transactions')->name('transactions.index');
    
    // URL: /admin/categories  |  Nama Route: admin.categories.index
    Route::get('/categories', [CategoryController::class, 'index'])->name('categories.index');
    
});