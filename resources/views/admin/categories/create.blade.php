@extends('layouts.admin')

@section('page_title', 'Tambah Kategori')
@section('page_subtitle', 'Buat jenis pengelompokan event baru.')

@section('content')
<div class="max-w-2xl bg-white rounded-[2rem] border border-slate-100 p-8 shadow-sm">
    <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-6">
        @csrf
        <div>
            <label class="block text-sm font-bold text-slate-700 mb-2">Nama Kategori</label>
            <input type="text" name="name" required placeholder="Contoh: Konser Musik, Workshop, Seminar" class="w-full px-4 py-3 bg-slate-50 border-none rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none font-medium">
            @error('name')
                <p class="text-rose-500 text-xs mt-1 font-semibold">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="flex gap-3 pt-4">
            <button type="submit" class="px-6 py-3 bg-indigo-600 text-white rounded-xl font-bold shadow-lg hover:bg-indigo-700 transition">
                Simpan Kategori
            </button>
            <a href="{{ route('admin.categories.index') }}" class="px-6 py-3 bg-slate-100 text-slate-600 rounded-xl font-bold hover:bg-slate-200 transition">
                Batal
            </a>
        </div>
    </form>
</div>
@endsection