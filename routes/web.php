<?php

use Illuminate\Support\Facades\Route;

// Import Controller
use App\Http\Controllers\HomeController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\CheckoutController;
use App\Http\Controllers\AuthController; // Tambahkan ini
use App\Http\Controllers\Admin\EventController as AdminEventController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\TransactionController;
use App\Http\Controllers\Admin\PartnerController as AdminPartnerController;

/* --- RUTE PUBLIK --- */

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::view('/profil', 'profil')->name('profil');
Route::view('/katalog', 'katalog')->name('katalog');
Route::view('/bantuan', 'bantuan')->name('bantuan');
Route::view('/kontak', 'kontak')->name('kontak');

/* --- RUTE AUTHENTICATION (Login) --- */
Route::get('/admin/login', [AuthController::class, 'showLoginForm'])->name('login');
Route::post('/admin/login', [AuthController::class, 'login']);
Route::post('/admin/logout', [AuthController::class, 'logout'])->name('logout'); // Tambahkan logout

/* --- RUTE DETAIL & TRANSAKSI --- */
Route::get('/ticket', [TicketController::class, 'show'])->name('ticket');
Route::get('/event/{event}', [EventController::class, 'show'])->name('event.show');
Route::get('/checkout/{event}', [CheckoutController::class, 'create'])->name('checkout.create');
Route::post('/checkout/{event}', [CheckoutController::class, 'store'])->name('checkout.store');

/* --- RUTE ADMIN PANEL (DIPROTEKSI MIDDLEWARE) --- */
// Semua rute di dalam group ini akan meminta login terlebih dahulu
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {

   

    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');


    Route::resource('events', AdminEventController::class);




    Route::resource('categories', CategoryController::class);


    Route::get('/transactions', [TransactionController::class, 'index'])->name('transactions.index');

    Route::resource('partners', AdminPartnerController::class);
    
});