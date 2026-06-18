<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Event;

class EventController extends Controller
{
    public function show(Event $event)
    {
        return view('event-detail', compact('event'));
    }
}