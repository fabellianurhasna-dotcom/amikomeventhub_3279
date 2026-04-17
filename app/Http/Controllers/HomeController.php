<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        // Mengembalikan view welcome.blade.php
        return view('welcome');
    }
}