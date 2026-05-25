<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // 🌟 PENTING: Untuk urusan hapus file fisik

class PartnerController extends Controller
{
    /**
     * 1. HALAMAN UTAMA: Daftar semua partner yang terdaftar
     */
    public function index()
    {
        $partners = Partner::all();
        return view('admin.partners.index', compact('partners'));
    }

    /**
     * 2. HALAMAN FORM TAMBAH: Menampilkan form tambah partner baru
     */
    public function create()
    {
        return view('admin.partners.create');
    }

    /**
     * 3. PROSES SIMPAN: Validasi input, upload logo, dan simpan data partner
     */
    public function store(Request $request)
    {
        // Validasi input nama, email (wajib unik), dan file logo
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:partners,email',
            'logo' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048', // Maksimal 2MB
        ]);

        // Proses Upload Gambar ke storage/app/public/partners
        $logoPath = null;
        if ($request->hasFile('logo')) {
            $logoPath = $request->file('logo')->store('partners', 'public');
        }

        // Simpan data ke database beserta path logo dan email
        Partner::create([
            'name' => $request->name,
            'email' => $request->email,
            'logo' => $logoPath,
        ]);

        return redirect()->route('admin.partners.index')
            ->with('success', 'Partner baru dengan logo berhasil ditambahkan!');
    }

    /**
     * 4. HALAMAN FORM EDIT: Menampilkan data lama partner untuk diubah
     */
    public function edit(Partner $partner)
    {
        return view('admin.partners.edit', compact('partner'));
    }

    /**
     * 5. PROSES UPDATE: Memperbarui data & mengganti logo lama jika ada upload baru
     */
    public function update(Request $request, Partner $partner)
    {
        // Validasi input (email unik kecuali untuk id partner yang sedang diedit ini)
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:partners,email,' . $partner->id,
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,svg|max:2048', // Boleh kosong jika tidak ganti logo
        ]);

        // Tampung data teks dasar
        $data = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        // Kondisi jika admin mengunggah file logo baru
        if ($request->hasFile('logo')) {
            // Hapus berkas gambar lama dari storage agar tidak membebani server
            if ($partner->logo) {
                Storage::disk('public')->delete($partner->logo);
            }

            // Simpan gambar baru ke storage
            $data['logo'] = $request->file('logo')->store('partners', 'public');
        }

        // Jalankan perintah update ke database
        $partner->update($data);

        return redirect()->route('admin.partners.index')
            ->with('success', 'Data partner dan logo berhasil diperbarui!');
    }

    /**
     * 6. PROSES HAPUS: Menghapus data di DB sekaligus file logo fisiknya
     */
    public function destroy(Partner $partner)
    {
        // Hapus file gambar fisik dari folder storage agar tidak menumpuk sampah
        if ($partner->logo) {
            Storage::disk('public')->delete($partner->logo);
        }

        // Hapus baris data dari database
        $partner->delete();

        return redirect()->route('admin.partners.index')
            ->with('success', 'Partner berhasil dihapus!');
    }
}