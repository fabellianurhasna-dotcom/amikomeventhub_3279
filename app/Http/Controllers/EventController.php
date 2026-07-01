<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    /**
     * Menampilkan halaman detail event untuk pengunjung biasa
     * Sesuai dengan rute: Route::get('/event/{event}', ...)
     */
    public function show(Event $event)
    {
        return view('event-detail', compact('event'));
    }
}