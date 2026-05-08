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
use App\Http\Controllers\Admin\EventController as AdminEventController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// RUTE HALAMAN STATIS
Route::view('/profil', 'profil')->name('profil');
Route::view('/katalog', 'katalog')->name('katalog');
Route::view('/bantuan', 'bantuan')->name('bantuan');
Route::view('/kontak', 'kontak')->name('kontak');

// RUTE PUBLIK
Route::get('/', function () { return view('welcome'); })->name('home');
Route::get('/event/detail', function () { return view('event-detail'); })->name('event.show');
Route::get('/checkout', function () { return view('checkout'); })->name('checkout');
Route::get('/ticket', function () { return view('ticket'); })->name('ticket');

// RUTE ADMIN
Route::prefix('admin')->name('admin.')->group(function () {
    
    Route::get('/dashboard', function () { 
        return view('admin.dashboard'); 
    })->name('dashboard');

    Route::resource('events', AdminEventController::class);

    Route::get('/transactions', function () { 
        return view('admin.transactions'); 
    })->name('transactions.index');
    
    // KATEGORI (DENGAN PROTEKSI DATABASE)
    Route::get('/categories', function () { 
        try {
            // Coba ambil data kategori
            $categories = \App\Models\Category::all();
            return view('admin.categoris.index', compact('categories')); 
        } catch (\Exception $e) {
            // Jika DB error, kirim variabel kosong saja biar web nggak mati total
            $categories = collect(); 
            return view('admin.categoris.index', compact('categories'))->with('error', 'Koneksi database bermasalah.');
        }
    })->name('categories.index');
    
});