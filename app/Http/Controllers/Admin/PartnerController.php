<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // 🌟 PENTING: Import ini untuk urusan hapus file

class PartnerController extends Controller
{
    public function index()
    {
        $partners = Partner::all();
        return view('admin.partners.index', compact('partners'));
    }

    public function create()
    {
        // 🌟 Tampilkan halaman form tambah partner
        return view('admin.partners.create');
    }

    public function store(Request $request)
{
    // 🌟 Ditambahkan validasi email
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:partners,email', // Tambahan email wajib unik
        'logo' => 'required|image|mimes:jpeg,png,jpg,svg|max:2048',
    ]);

    // Proses Upload Gambar
    $logoPath = null;
    if ($request->hasFile('logo')) {
        $logoPath = $request->file('logo')->store('partners', 'public');
    }

    // 🌟 Simpan data ke database beserta email
    Partner::create([
        'name' => $request->name,
        'email' => $request->email, // Tambahan baris email
        'logo' => $logoPath,
    ]);

    return redirect()->route('admin.partners.index')
        ->with('success', 'Partner baru dengan logo berhasil ditambahkan!');
}

    public function destroy(Partner $partner)
    {
        // 🌟 Hapus file gambar fisik dari folder storage agar tidak menumpuk sampah
        if ($partner->logo) {
            Storage::disk('public')->delete($partner->logo);
        }

        $partner->delete();

        return redirect()->route('admin.partners.index')
            ->with('success', 'Partner berhasil dihapus!');
    }
}