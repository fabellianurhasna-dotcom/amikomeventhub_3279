@extends('layouts.admin')

@section('page_title', 'Tambah Partner')
@section('page_subtitle', 'Masukkan data instansi pendukung beserta logo resminya.')

@section('content')
<div class="max-w-2xl bg-white rounded-[2rem] border border-slate-100 p-8 shadow-sm">
    
    <form action="{{ route('admin.partners.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
        @csrf
        
        {{-- Input Nama Partner --}}
        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2">Nama Instansi / Partner</label>
            <input type="text" name="name" value="{{ old('name') }}" required placeholder="Contoh: PT. Amikom Media, HMPTI" class="w-full px-4 py-3 bg-slate-50 border-none rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none font-medium">
            @error('name')
                <p class="text-rose-500 text-xs mt-1 font-semibold">{{ $message }}</p>
            @enderror
        </div>

        {{-- 🌟 TAMBAHAN BARU: Input Email Partner --}}
        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2">Email Resmi Partner</label>
            <input type="email" name="email" value="{{ old('email') }}" required placeholder="Contoh: info@hmpti.org" class="w-full px-4 py-3 bg-slate-50 border-none rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none font-medium">
            @error('email')
                <p class="text-rose-500 text-xs mt-1 font-semibold">{{ $message }}</p>
            @enderror
        </div>

        {{-- Input File Gambar Logo --}}
        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2">Logo Partner</label>
            <div class="w-full p-6 bg-slate-50 rounded-xl border-2 border-dashed border-slate-200 text-center">
                <input type="file" name="logo" required accept="image/*" class="mx-auto block text-sm font-medium text-slate-500 file:mr-4 file:py-2 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-bold file:bg-indigo-50 file:text-indigo-600 hover:file:bg-indigo-100">
                <p class="text-xs text-slate-400 mt-2">Format: JPG, PNG, SVG (Maks. 2MB)</p>
            </div>
            @error('logo')
                <p class="text-rose-500 text-xs mt-1 font-semibold">{{ $message }}</p>
            @enderror
        </div>
        
        {{-- Tombol Aksi --}}
        <div class="flex gap-3 pt-4">
            <button type="submit" class="px-6 py-3 bg-indigo-600 text-white rounded-xl font-bold shadow-lg hover:bg-indigo-700 transition">
                Simpan Partner
            </button>
            <a href="{{ route('admin.partners.index') }}" class="px-6 py-3 bg-slate-100 text-slate-600 rounded-xl font-bold hover:bg-slate-200 transition">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection