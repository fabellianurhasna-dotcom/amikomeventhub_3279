@extends('layouts.admin')

@section('page_title', 'Kelola Partner')
@section('page_subtitle', 'Daftar instansi pendukung AmikomEventHub')

@section('content')
@if(session('success'))
    <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-2xl font-bold">
        ✅ {{ session('success') }}
    </div>
@endif

<div class="bg-white rounded-[2rem] border border-slate-100 shadow-sm overflow-hidden">
    <div class="p-8 border-b border-slate-50 flex justify-between items-center">
        <h3 class="font-bold text-slate-800 text-lg">Semua Partner</h3>
        <a href="{{ route('admin.partners.create') }}" class="px-6 py-3 bg-indigo-600 text-white rounded-xl font-bold shadow-lg shadow-indigo-200 hover:bg-indigo-700 transition">
            + Tambah Partner
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="w-full text-left">
            <thead class="bg-slate-50 text-slate-400 text-[10px] font-bold uppercase tracking-widest">
                <tr>
                    <th class="px-8 py-4 w-20">No</th>
                    <th class="px-8 py-4">Logo</th>
                    <th class="px-8 py-4">Nama Partner</th>
                    <th class="px-8 py-4 text-center">Aksi</th>
                </tr>
            </thead>
            <tbody class="divide-y divide-slate-50">
                @forelse($partners as $index => $partner)
                <tr class="hover:bg-slate-50 transition">
                    <td class="px-8 py-6 font-medium text-slate-400">{{ $index + 1 }}</td>
                    
                    {{-- MERENDER GAMBAR LOGO SECARA DINAMIS --}}
                    <td class="px-8 py-6">
                        <div class="w-16 h-10 bg-slate-100 rounded-lg p-1 flex items-center justify-center overflow-hidden border border-slate-200/50">
                            @if($partner->logo)
                                <img src="{{ asset('storage/' . $partner->logo) }}" alt="Logo {{ $partner->name }}" class="max-w-full max-h-full object-contain">
                            @else
                                <span class="text-[10px] text-slate-400 font-bold">No Logo</span>
                            @endif
                        </div>
                    </td>

                    <td class="px-8 py-6 font-bold text-slate-900">
                        <div>
                            <p>{{ $partner->name }}</p>
                            <p class="text-xs font-medium text-slate-400 mt-0.5">{{ $partner->email }}</p>
                        </div>
                    </td>
                    
                    <td class="px-8 py-6">
                        <div class="flex justify-center gap-2">
                            {{-- 🌟 TOMBOL EDIT PARTNER --}}
                            <a href="{{ route('admin.partners.edit', $partner->id) }}" class="p-2.5 bg-amber-50 text-amber-600 rounded-xl hover:bg-amber-500 hover:text-white transition" title="Edit Partner">
                                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"></path>
                                </svg>
                            </a>

                            {{-- TOMBOL HAPUS PARTNER --}}
                            <form action="{{ route('admin.partners.destroy', $partner->id) }}" method="POST" onsubmit="return confirm('Hapus partner ini?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-2.5 bg-rose-50 text-rose-600 rounded-xl hover:bg-rose-600 hover:text-white transition" title="Hapus Partner">
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
                        Belum ada partner terdaftar.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection