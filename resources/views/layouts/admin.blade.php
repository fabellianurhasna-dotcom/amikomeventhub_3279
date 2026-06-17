<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - AmikomEventHub</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>

<body class="bg-slate-50 text-slate-900 antialiased">

    <div class="flex min-h-screen">
        
        <aside class="w-72 bg-white border-r border-slate-100 flex flex-col justify-between p-6 shrink-0 sticky top-0 h-screen">
            <div class="space-y-8">
                {{-- Logo Aplikasi & Link Kembali Ke Beranda --}}
                <a href="{{ route('home') }}" class="flex items-center gap-3 px-2 hover:opacity-80 transition">
                    <div class="w-10 h-10 bg-indigo-600 rounded-xl flex items-center justify-center text-white font-bold text-xl shadow-md shadow-indigo-100">
                        AH
                    </div>
                    <div>
                        <span class="text-lg font-black tracking-tight block">Admin Panel</span>
                        <span class="text-xs font-semibold text-slate-400 block mt-0.5">← Kembali ke web</span>
                    </div>
                </a>

                <hr class="border-slate-50">

                {{-- Kumpulan Menu Navigasi --}}
                <nav class="space-y-1">
                    <p class="text-[10px] font-bold text-slate-400 uppercase tracking-widest px-3 mb-3">Menu Utama</p>

                    <a href="{{ route('admin.dashboard') }}" 
                       class="flex items-center gap-3 px-4 py-3.5 rounded-xl font-bold text-sm transition-all duration-200 {{ request()->routeIs('admin.dashboard') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-100' : 'text-slate-600 hover:bg-slate-50 hover:text-indigo-600' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2V6zM14 6a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2V6zM4 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2H6a2 2 0 01-2-2v-4zM14 16a2 2 0 012-2h2a2 2 0 012 2v4a2 2 0 01-2 2h-2a2 2 0 01-2-2v-4z"></path>
                        </svg>
                        <span>Dashboard</span>
                    </a>

                    <a href="{{ route('admin.categories.index') }}" 
                       class="flex items-center gap-3 px-4 py-3.5 rounded-xl font-bold text-sm transition-all duration-200 {{ request()->routeIs('admin.categories.*') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-100' : 'text-slate-600 hover:bg-slate-50 hover:text-indigo-600' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path>
                        </svg>
                        <span>Kelola Kategori</span>
                    </a>

                    <a href="{{ route('admin.events.index') }}" 
                       class="flex items-center gap-3 px-4 py-3.5 rounded-xl font-bold text-sm transition-all duration-200 {{ request()->routeIs('admin.events.*') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-100' : 'text-slate-600 hover:bg-slate-50 hover:text-indigo-600' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path>
                        </svg>
                        <span>Kelola Event</span>
                    </a>

                    <a href="{{ route('admin.partners.index') }}" 
                       class="flex items-center gap-3 px-4 py-3.5 rounded-xl font-bold text-sm transition-all duration-200 {{ request()->routeIs('admin.partners.*') ? 'bg-indigo-600 text-white shadow-lg shadow-indigo-100' : 'text-slate-600 hover:bg-slate-50 hover:text-indigo-600' }}">
                        <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path>
                        </svg>
                        <span>Kelola Partner</span>
                    </a>
                </nav>
            </div>

            {{-- Info Akun Sederhana & TOMBOL LOGOUT TERINTEGRASI DI SINI --}}
            <div class="p-4 bg-slate-50 rounded-2xl flex items-center justify-between gap-3">
                <div class="flex items-center gap-3">
                    <div class="w-9 h-9 bg-indigo-100 text-indigo-700 rounded-xl flex items-center justify-center font-bold text-sm">
                        AD
                    </div>
                    <div>
                        <p class="text-xs font-black text-slate-800">Administrator</p>
                        <p class="text-[10px] font-medium text-slate-400">Ujian UTS Berjalan</p>
                    </div>
                </div>
                
                {{-- FORM LOGOUT FORMAL DAN AMAN --}}
                <form action="{{ route('logout') }}" method="POST" class="flex items-center">
                    @csrf
                    <button type="submit" title="Keluar Aplikasi" class="w-8 h-8 bg-rose-50 text-rose-600 hover:bg-rose-100 rounded-xl flex items-center justify-center transition shadow-sm">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                        </svg>
                    </button>
                </form>
            </div>
        </aside>

        <main class="flex-1 min-w-0 p-10">
            {{-- Header Atas Judul Halaman Dinamis --}}
            <header class="mb-10 flex justify-between items-center">
                <div>
                    <h1 class="text-3xl font-black text-slate-950">@yield('page_title', 'Admin Dashboard')</h1>
                    <p class="text-sm font-medium text-slate-400 mt-1">@yield('page_subtitle', 'Selamat datang kembali di panel kendali sistem.')</p>
                </div>
                <div class="px-4 py-2 bg-white border border-slate-100 rounded-xl text-xs font-bold text-slate-500 shadow-sm">
                    Status: <span class="text-emerald-500">● Database Connected</span>
                </div>
            </header>

            {{-- Tempat Merender Konten Utama Masing-Masing Halaman View --}}
            @yield('content')
        </main>

    </div>

</body>
</html>