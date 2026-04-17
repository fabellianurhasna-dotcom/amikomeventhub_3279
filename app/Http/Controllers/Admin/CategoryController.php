<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
{
    // Pastikan tulisannya 'admin.categories.index'
    // 'admin' (folder) -> 'categories' (folder) -> 'index' (file index.blade.php)
    return view('admin.categories.index');
}
}

