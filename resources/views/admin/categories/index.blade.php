@extends('layouts.admin')

@section('page_title', 'Kelola Kategori')
@section('page_subtitle', 'Manajemen kategori event AmikomEventHub')

@section('content')
{{-- Alert Flash Message Sukses/Gagal --}}
@if(session('success'))
    <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-2xl font-bold flex items-center gap-3">
        <span>✅ {{ session('success') }}</span>
    </div>
@endif

@if(session('error'))
    <div class="mb-6 p-4 bg-rose-50 border border-rose-200 text-rose-700 rounded-2xl font-bold flex items-center gap-3">
        <span>⚠️ {{ session('error') }}</span>
    </div>
@endif

<div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm overflow-hidden">
    <div class="p-8 border-b border-slate-50 flex flex-col md:flex-row justify-between items-center gap-4">
        
        {{-- FORM PENCARIAN (Menyelesaikan Soal 3 menggunakan metode GET) --}}
        <form action="{{ route('admin.categories.index') }}" method="GET" class="relative w-full md:w-96">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari kategori..." class="w-full pl-12 pr-4 py-3 bg-slate-50 border-none rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none font-medium">
            <button type="submit" class="absolute left-4 top-3.5 text-slate-400 hover:text-indigo-600 transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                </svg>
            </button>
            {{-- Tombol reset filter pencarian jika sedang menyaring data --}}
            @if(request('search'))
                <a href="{{ route('admin.categories.index') }}" class="absolute right-4 top-3.5 text-xs font-bold text-rose-500 hover:underline">
                    Reset
                </a>
            @endif
        </form>

        {{-- 🌟 TOMBOL TAMBAH KATEGORI (Sudah diperbaiki, tidak double lagi) --}}
        <a href="{{ route('admin.categories.create') }}" class="w-full md:w-auto px-6 py-3 bg-indigo-600 text-white rounded-xl font-bold shadow-lg shadow-indigo-200 hover:bg-indigo-700 text-center transition flex items-center justify-center gap-2">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
            </svg>
            <span>Tambah Kategori</span>
        </a>
    </div>
    
    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-slate-50 text-slate-400 text-[10px] font-bold uppercase tracking-widest">
                <tr>
                    <th class="px-8 py-4 w-20">No</th>
                    <th class="px-8 py-4">Nama Kategori</th>
                    <th class="px-8 py-4 text-center">Total Event</th>
                    <th class="px-8 py-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                {{-- Merender data objek dari Controller --}}
                @forelse($categories as $index => $cat)
                <tr class="hover:bg-slate-50 transition">
                    <td class="px-8 py-6 font-medium text-slate-400">{{ $index + 1 }}</td>
                    <td class="px-8 py-6">
                        <span class="font-bold text-slate-900">{{ $cat->name }}</span>
                    </td>
                    <td class="px-8 py-6 text-center">
                        {{-- Mengambil properti instan hasil dari withCount('events') --}}
                        <span class="px-3 py-1 bg-indigo-100 text-indigo-700 rounded-lg text-xs font-bold">
                            {{ $cat->events_count ?? 0 }} Event
                        </span>
                    </td>
                    <td class="px-8 py-6">
                        <div class="flex justify-center gap-2">
                            {{-- Tombol Edit (Menuju ke rute edit) --}}
                            <a href="{{ route('admin.categories.edit', $cat->id) }}" class="p-2.5 bg-indigo-50 text-indigo-600 rounded-xl hover:bg-indigo-600 hover:text-white transition" title="Edit">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </a>
                            
                            {{-- Form Action untuk menghapus kategori secara dinamis --}}
                            <form action="{{ route('admin.categories.destroy', $cat->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2.5 bg-rose-50 text-rose-600 rounded-xl hover:bg-rose-600 hover:text-white transition" title="Hapus">
                                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16"></path>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="4" class="px-8 py-12 text-center text-slate-400 font-medium italic bg-slate-50/50">
                        Tidak ada kategori data yang ditemukan.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection