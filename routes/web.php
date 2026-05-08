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
// Gunakan alias 'AdminEventController' agar tidak bentrok dengan EventController milik User
use App\Http\Controllers\Admin\EventController as AdminEventController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ==========================================
// RUTE HALAMAN STATIS (NAVBAR)
// ==========================================
Route::view('/profil', 'profil')->name('profil');
Route::view('/katalog', 'katalog')->name('katalog');
Route::view('/bantuan', 'bantuan')->name('bantuan');
Route::view('/kontak', 'kontak')->name('kontak');


// ==========================================
// RUTE PUBLIK / PENGGUNA 
// ==========================================
Route::get('/', function () { return view('welcome'); })->name('home');
Route::get('/event/detail', function () { return view('event-detail'); })->name('event.show');
Route::get('/checkout', function () { return view('checkout'); })->name('checkout');
Route::get('/ticket', function () { return view('ticket'); })->name('ticket');


// ==========================================
// RUTE SISI ADMIN
// ==========================================
Route::prefix('admin')->name('admin.')->group(function () {
    
    // Dashboard
    Route::get('/dashboard', function () { 
        return view('admin.dashboard'); 
    })->name('dashboard');

    // Events
    Route::resource('events', AdminEventController::class);

    // Transactions
    Route::get('/transactions', function () { 
        return view('admin.transactions'); 
    })->name('transactions.index');
    
    // Categories (DENGAN JEBAKAN ERROR)
    Route::get('/categories', function () { 
        try {
            $categories = \App\Models\Category::latest()->get();
            return view('admin.categoris.index', compact('categories')); 
        } catch (\Exception $e) {
            // MUNCULKAN ERROR ASLI KE LAYAR
            dd([
                'Pesan_Error_Asli' => $e->getMessage(),
                'Letak_File_Error' => $e->getFile(),
                'Di_Baris_Ke' => $e->getLine()
            ]);
        }
    })->name('categories.index');
    
});