<?php

// 🌟 PERBAIKAN: Namespace harus mengarah ke folder Admin
namespace App\Http\Controllers\Admin; 

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Category;
use App\Models\Partner;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung jumlah total data secara live dari database
        $totalEvents = Event::count();
        $totalCategories = Category::count();
        $totalPartners = Partner::count();

        // Kirim data hitungan ke file view dashboard admin
        return view('admin.dashboard', compact('totalEvents', 'totalCategories', 'totalPartners'));
    }
}