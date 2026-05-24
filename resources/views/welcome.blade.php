@extends('layouts.app')

@section('content')
    <section class="max-w-7xl mx-auto px-6 py-20 flex flex-col md:flex-row items-center gap-12">
        <div class="flex-1 space-y-8">
            <span class="inline-block px-4 py-1.5 bg-indigo-100 text-indigo-700 rounded-full text-sm font-bold uppercase tracking-wider">
                #1 Event Platform
            </span>
            <h1 class="text-5xl md:text-7xl font-extrabold leading-tight">
                Temukan & Pesan <span class="text-indigo-600">Tiket Event</span> Impianmu.
            </h1>
            <p class="text-lg text-slate-500 max-w-lg leading-relaxed">
                Dari konser musik hingga workshop teknologi, semua ada di genggamanmu. Pesan aman & cepat dengan Midtrans.
            </p>
            <div class="flex gap-4">
                <a href="#events" class="px-8 py-4 bg-indigo-600 text-white rounded-2xl font-bold text-lg shadow-xl shadow-indigo-200 hover:scale-105 transition-transform">
                    Mulai Jelajah
                </a>
                <a href="#" class="px-8 py-4 border-2 border-slate-200 rounded-2xl font-bold text-lg hover:border-indigo-600 hover:text-indigo-600 transition">
                    Cara Pesan
                </a>
            </div>
        </div>
        <div class="flex-1 relative">
            <div class="absolute -top-10 -left-10 w-64 h-64 bg-indigo-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob"></div>
            <div class="absolute -bottom-10 -right-10 w-64 h-64 bg-purple-400 rounded-full mix-blend-multiply filter blur-3xl opacity-20 animate-blob animation-delay-2000"></div>
            
            {{-- Menggunakan fallback image jika file lokal tidak ditemukan --}}
            <img src="{{ asset('assets/concert.png') }}" onerror="this.src='https://images.unsplash.com/photo-1506157786151-b8491531f063?auto=format&fit=crop&w=800&q=80'" alt="Concert" class="rounded-[2rem] shadow-2xl relative z-10 w-full object-cover aspect-[4/5] object-center">

            <div class="absolute -bottom-6 -left-6 glass p-6 rounded-2xl shadow-xl z-20 border border-white">
                <div class="flex items-center gap-4">
                    <div class="w-12 h-12 bg-green-100 rounded-full flex items-center justify-center text-green-600">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-slate-500 font-bold uppercase">Terverifikasi</p>
                        <p class="font-bold">Pembayaran Aman via Midtrans</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="events" class="max-w-7xl mx-auto px-6 py-20">
        <div class="flex justify-between items-end mb-12">
            <div>
                <h2 class="text-3xl font-extrabold mb-2">Event Terdekat</h2>
                <p class="text-slate-500 font-medium">Jangan sampai ketinggalan acara seru minggu ini!</p>
            </div>
            <div class="flex gap-2">
                <a href="{{ route('katalog') }}" class="px-5 py-3 border rounded-xl bg-white hover:shadow-md transition text-sm font-bold text-slate-700">
                    Semua Kategori
                </a>
            </div>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            {{-- Melakukan perulangan data Event asli dari Database --}}
            @forelse($events as $event)
                <div class="group bg-white rounded-3xl border border-slate-100 shadow-sm hover:shadow-2xl transition-all duration-300 overflow-hidden flex flex-col justify-between">
                    <div>
                        <div class="relative overflow-hidden aspect-[3/4] bg-slate-100">
                            {{-- Render poster dinamis dari folder storage upload --}}
                            @if($event->poster_path)
                                <img src="{{ asset('storage/' . $event->poster_path) }}" alt="{{ $event->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500">
                            @else
                                <div class="w-full h-full flex items-center justify-center text-slate-400 font-bold">No Poster</div>
                            @endif
                            
                            {{-- Menampilkan nama kategori relasi secara dinamis --}}
                            <div class="absolute top-4 left-4 px-3 py-1 bg-white/90 backdrop-blur rounded-lg text-xs font-bold uppercase text-indigo-600 shadow-sm">
                                {{ $event->category->name ?? 'Umum' }}
                            </div>
                        </div>
                        <div class="p-6">
                            <h3 class="text-xl font-bold mb-2 group-hover:text-indigo-600 transition line-clamp-2">
                                {{ $event->title }}
                            </h3>
                            <div class="flex items-center gap-2 text-slate-500 text-sm mb-4">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                </svg>
                                <span>{{ \Carbon\Carbon::parse($event->date)->translatedFormat('d F Y, H:i') }} WIB</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="p-6 pt-0">
                        <div class="flex justify-between items-center pt-4 border-t border-slate-50">
                            <span class="text-2xl font-black text-indigo-600">
                                {{ $event->price == 0 ? 'Gratis' : 'Rp ' . number_format($event->price, 0, ',', '.') }}
                            </span>
                            <a href="{{ route('event.show', ['id' => $event->id]) }}" class="px-5 py-2 bg-indigo-50 text-indigo-600 rounded-xl font-bold hover:bg-indigo-600 hover:text-white transition">
                                Lihat Detail
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                {{-- Tampilan Fallback jika database events masih kosong --}}
                <div class="col-span-1 md:col-span-2 lg:col-span-3 text-center py-16 bg-slate-50 rounded-3xl border border-dashed border-slate-200">
                    <p class="text-slate-400 font-medium italic">Belum ada data event terdekat yang aktif saat ini.</p>
                </div>
            @endforelse
        </div>
    </section>

    {{-- SECTION PARTNER RESMI (Sudah Diperbarui Menjadi Logo Dinamis) --}}
    <section class="max-w-7xl mx-auto px-6 py-16 border-t border-slate-100 bg-slate-50/50 rounded-[2rem] mb-12">
        <p class="text-center text-xs font-bold uppercase tracking-widest text-slate-400 mb-8">
            Daftar Partner Resmi Pendukung AmikomEventHub
        </p>
        <div class="flex flex-wrap justify-center items-center gap-12 md:gap-20">
            @foreach($partners as $partner)
                <div class="flex flex-col items-center gap-2 group transition duration-300">
                    
                    {{-- Validasi jika partner memiliki file logo --}}
                    @if(!empty($partner->logo))
                        <div class="w-32 h-16 flex items-center justify-center overflow-hidden grayscale opacity-60 group-hover:grayscale-0 group-hover:opacity-100 transition duration-300">
                            <img src="{{ asset('storage/' . $partner->logo) }}" alt="Logo {{ $partner->name }}" class="max-w-full max-h-full object-contain">
                        </div>
                    @else
                        {{-- Tampilan alternatif berupa inisial teks estetik jika file gambar kosong --}}
                        <div class="w-32 h-16 bg-white border border-slate-200 rounded-xl flex items-center justify-center shadow-sm text-slate-400 font-bold text-xs uppercase tracking-wider">
                            {{ Str::limit($partner->name, 10) }}
                        </div>
                    @endif

                    {{-- Nama Instansi Partner --}}
                    <span class="text-xs font-bold text-slate-500 group-hover:text-indigo-600 transition">
                        {{ $partner->name }}
                    </span>
                </div>
            @endforeach
        </div>
    </section>
@endsection