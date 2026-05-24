@extends('layouts.admin')

@section('page_title', 'Dashboard Ringkasan')
@section('page_subtitle', 'Statistik real-time data aplikasi AmikomEventHub.')

@section('content')
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        
        <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm flex items-center justify-between">
            <div class="space-y-2">
                <p class="text-sm font-bold text-slate-400 uppercase tracking-wider">Total Event</p>
                <h3 class="text-4xl font-black text-slate-900">{{ $totalEvents }}</h3>
                <p class="text-xs text-indigo-500 font-medium">Event terdaftar di sistem</p>
            </div>
            <div class="w-14 h-14 bg-indigo-50 rounded-2xl flex items-center justify-center text-indigo-600">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                </svg>
            </div>
        </div>

        <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm flex items-center justify-between">
            <div class="space-y-2">
                <p class="text-sm font-bold text-slate-400 uppercase tracking-wider">Total Kategori</p>
                <h3 class="text-4xl font-black text-slate-900">{{ $totalCategories }}</h3>
                <p class="text-xs text-emerald-500 font-medium">Ragam pengelompokan acara</p>
            </div>
            <div class="w-14 h-14 bg-emerald-50 rounded-2xl flex items-center justify-center text-emerald-600">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                </svg>
            </div>
        </div>

        <div class="bg-white p-6 rounded-[2rem] border border-slate-100 shadow-sm flex items-center justify-between">
            <div class="space-y-2">
                <p class="text-sm font-bold text-slate-400 uppercase tracking-wider">Total Partner</p>
                <h3 class="text-4xl font-black text-slate-900">{{ $totalPartners }}</h3>
                <p class="text-xs text-rose-500 font-medium">Instansi pendukung aktif</p>
            </div>
            <div class="w-14 h-14 bg-rose-50 rounded-2xl flex items-center justify-center text-rose-600">
                <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                </svg>
            </div>
        </div>

    </div>

    
@endsection