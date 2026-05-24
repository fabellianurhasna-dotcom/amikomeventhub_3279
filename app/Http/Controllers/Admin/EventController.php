<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class EventController extends Controller
{
    /**
     * Menampilkan daftar event dengan fitur pencarian (Jawaban Soal 3)
     */
    public function index(Request $request)
    {
        // Ambil kata kunci pencarian dari parameter URL (?search=...)
        $search = $request->input('search');

        // Buat query dasar database dengan memanggil Eager Loading relasi 'category'
        $query = Event::with('category');

        // JIKA admin mengisi kolom pencarian, lakukan seleksi data dengan klausa WHERE LIKE
        if (!empty($search)) {
            $query->where('title', 'LIKE', '%' . $search . '%')
                  ->orWhere('location', 'LIKE', '%' . $search . '%')
                  ->orWhereHas('category', function ($q) use ($search) {
                      $q->where('name', 'LIKE', '%' . $search . '%');
                  });
        }

        // Ambil data event terbaru berdasarkan modifikasi filter di atas
        $events = $query->latest()->get();

        // Kirim data event dan variabel search ke halaman view index admin
        return view('admin.events.index', compact('events', 'search'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('admin.events.create', compact('categories'));
    }

    public function store(Request $request)
    {
        // Validasi Ketat Sesuai Kriteria Proteksi Database (Jawaban Soal 2)
        $request->validate([
            'title'       => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:1',
            'location'    => 'required|string|max:255',
            'poster'      => 'required|image|mimes:jpeg,png,jpg,webp|max:2048', // Maksimal berkas poster 2MB
        ]);

        try {
            // Proses upload berkas poster ke disk public (storage/app/public/posters)
            $posterPath = $request->file('poster')->store('posters', 'public');

            // Simpan data event baru memanfaatkan Mass Assignment dari Model Eloquent (Soal 1)
            Event::create([
                'title'       => $request->title,
                'category_id' => $request->category_id,
                'price'       => $request->price,
                'stock'       => $request->stock,
                'location'    => $request->location,
                'poster_path' => $posterPath,
                'date'        => now(), // Mengisi kolom date default bawaan migration sistem Anda
            ]);

            return redirect()->route('admin.events.index')->with('success', 'Data Event baru berhasil ditambahkan ke database!');

        } catch (\Exception $e) {
            // Flash message gagal jika terjadi error tak terduga pada sistem database
            return redirect()->back()->withInput()->with('error', 'Gagal menyimpan data event: ' . $e->getMessage());
        }
    }

    public function edit($id)
    {
        $event = Event::findOrFail($id);
        $categories = Category::all();
        return view('admin.events.edit', compact('event', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $event = Event::findOrFail($id);

        $request->validate([
            'title'       => 'required|string|max:255',
            'category_id' => 'required|exists:categories,id',
            'price'       => 'required|numeric|min:0',
            'stock'       => 'required|integer|min:1',
            'location'    => 'required|string|max:255',
            'poster'      => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
        ]);

        $data = [
            'title'       => $request->title,
            'category_id' => $request->category_id,
            'price'       => $request->price,
            'stock'       => $request->stock,
            'location'    => $request->location,
        ];

        if ($request->hasFile('poster')) {
            // Hapus file poster lama dari local storage jika diganti baru
            if ($event->poster_path) {
                Storage::disk('public')->delete($event->poster_path);
            }
            $data['poster_path'] = $request->file('poster')->store('posters', 'public');
        }

        $event->update($data);
        return redirect()->route('admin.events.index')->with('success', 'Data Event berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $event = Event::findOrFail($id);
        
        // Hapus berkas fisik gambar di local folder sebelum baris data di database dihapus
        if ($event->poster_path) {
            Storage::disk('public')->delete($event->poster_path);
        }
        
        $event->delete();
        return redirect()->route('admin.events.index')->with('success', 'Event berhasil dihapus dari sistem!');
    }
}