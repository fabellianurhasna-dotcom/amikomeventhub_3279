<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Category;
use App\Models\Partner; 
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Menampilkan halaman depan publik (Dinamis Event + Partner)
     */
    public function index()
    {
        $events = Event::with('category')->latest()->take(6)->get();
        $categories = Category::all();
        
        // Mengambil data partner dinamis untuk disuplai ke bagian bawah welcome
        $partners = Partner::latest()->get();

        return view('welcome', compact('events', 'categories', 'partners'));
    }
}