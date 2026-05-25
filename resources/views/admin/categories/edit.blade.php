@extends('layouts.admin')

@section('page_title', 'Edit Kategori')
@section('page_subtitle', 'Perbarui nama kategori event AmikomEventHub')

@section('content')
<div class="max-w-2xl bg-white rounded-[2rem] border border-slate-100 p-8 shadow-sm">
    
    <form action="{{ route('admin.categories.update', $category->id) }}" method="POST" class="space-y-6">
        @csrf
        @method('PUT') {{-- 🌟 PENTING: Laravel membutuhkan ini untuk proses Update/Put --}}
        
        {{-- Input Nama Kategori --}}
        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2">Nama Kategori</label>
            <input type="text" name="name" value="{{ old('name', $category->name) }}" required placeholder="Contoh: Workshop, Konser, Webinar" class="w-full px-4 py-3 bg-slate-50 border-none rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none font-medium">
            @error('name')
                <p class="text-rose-500 text-xs mt-1 font-semibold">{{ $message }}</p>
            @enderror
        </div>
        
        {{-- Tombol Aksi --}}
        <div class="flex gap-3 pt-4">
            <button type="submit" class="px-6 py-3 bg-indigo-600 text-white rounded-xl font-bold shadow-lg hover:bg-indigo-700 transition">
                Simpan Perubahan
            </button>
            <a href="{{ route('admin.categories.index') }}" class="px-6 py-3 bg-slate-100 text-slate-600 rounded-xl font-bold hover:bg-slate-200 transition">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection