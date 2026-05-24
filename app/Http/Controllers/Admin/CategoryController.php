<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * 1. HALAMAN UTAMA: Daftar Kategori + Fitur Pencarian Dinamis (Soal 3)
     */
    public function index(Request $request)
    {
        // Mengambil input pencarian dari form GET
        $search = $request->input('search');

        // Query dasar beserta hitung jumlah event terkait menggunakan relasi database
        $query = Category::withCount('events');

        // Jika user mengetik sesuatu di kolom pencarian, saring datanya
        if (!empty($search)) {
            $query->where('name', 'like', '%' . $search . '%');
        }

        // Ambil hasil akhir data dari database
        $categories = $query->get();

        // Lempar data ke file view index
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * 2. HALAMAN FORM: Menampilkan form tambah kategori baru
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * 3. PROSES SIMPAN: Memasukkan kategori + slug otomatis ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255|unique:categories,name',
        ]);

        // Menyimpan data dengan aman beserta slug-nya
        Category::create([
            'name' => $request->name,
            'slug' => Str::slug($request->name),
        ]);

        return redirect()->route('admin.categories.index')
            ->with('success', 'Kategori baru berhasil ditambahkan!');
    }

    /**
     * 4. PROSES HAPUS: Menghapus data kategori dari database
     */
    public function destroy(Category $category)
    {
        // Proteksi jika kategori masih mengikat event tertentu agar database tidak crash
        if ($category->events()->count() > 0) {
            return redirect()->route('admin.categories.index')
                ->with('error', 'Kategori gagal dihapus karena masih digunakan oleh beberapa event!');
        }

        $category->delete();

        return redirect()->route('admin.categories.index')
            ->with('success', 'Kategori berhasil dihapus dari sistem!');
    }
}