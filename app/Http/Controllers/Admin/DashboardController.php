<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Category;
use App\Models\Partner;
use App\Models\Transaction; // 🌟 Ditambahkan untuk modul transaksi
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // --- DATA DARI MODUL LAMA ---
        // Menghitung jumlah total data secara live dari database
        $totalEvents = Event::count();
        $totalCategories = Category::count();
        $totalPartners = Partner::count();


        // --- DATA BARU DARI TUGAS/MODUL BARU ---
        // 1. Menjumlahkan semua nominal total_price dari kolom Transaksi Lunas
        $totalRevenue = Transaction::whereIn('status', ['settlement', 'success'])->sum('total_price');
        
        // 2. Menghitung Berapa orang tamu yang tiketnya sudah Lunas
        $ticketsSold = Transaction::whereIn('status', ['settlement', 'success'])->count();
        
        // 3. Menghitung Jumlah Acara Mendatang yang aktif diselenggarakan
        $activeEvents = Event::where('date', '>=', now())->count();
        
        // 4. Menghitung Transaksi Ngadat (Status belum dibayar pelanggan / Expired)
        $pendingOrders = Transaction::where('status', 'pending')->count();
        
        // 5. Menyertakan 5 daftar riwayat pesanan (History) paling mutakhir di panel
        $recentTransactions = Transaction::with('event')->latest()->take(5)->get();


        // --- MENGIRIM SEMUA DATA KE VIEW ---
        // Semua variabel digabungkan di dalam fungsi compact()
        return view('admin.dashboard', compact(
            'totalEvents', 
            'totalCategories', 
            'totalPartners',
            'totalRevenue', 
            'ticketsSold', 
            'activeEvents', 
            'pendingOrders', 
            'recentTransactions'
        ));
    }
}