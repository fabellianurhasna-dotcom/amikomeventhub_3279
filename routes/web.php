<?php

use Illuminate\Support\Facades\Route;

// Import Controller
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AuthController; // Tambahkan ini
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\PartnerController as AdminPartnerController;

/* --- RUTE PUBLIK --- */

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::view('/profil', 'layout.profil')->name('profil');

Route::view('/katalog', 'layout.katalog')->name('katalog');
Route::view('/bantuan', 'layout.bantuan')->name('bantuan');
Route::view('/kontak', 'layout.kontak')->name('kontak');

/* --- RUTE AUTHENTICATION (Login) --- */
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout'); // Tambahkan logout

/* --- RUTE DETAIL & TRANSAKSI --- */
Route::get('/ticket', [TicketController::class, 'show'])->name('ticket');
Route::view('/event/detail', 'layout.event-detail')->name('event.show');
Route::view('/checkout', 'layout.checkout')->name('checkout');

/* --- RUTE ADMIN PANEL (DIPROTEKSI MIDDLEWARE) --- */
// Semua rute di dalam group ini akan meminta login terlebih dahulu
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {

   

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    Route::resource('events', AdminEventController::class);




    Route::resource('categories', CategoryController::class);


    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');

    Route::resource('partners', AdminPartnerController::class);
    
});