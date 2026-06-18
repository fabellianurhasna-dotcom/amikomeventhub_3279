@extends('layouts.app')

@section('content')
    <section class="py-16">
        <div class="max-w-6xl mx-auto px-6">
            <div class="mb-8">
                <a href="{{ route('home') }}" class="text-indigo-600 hover:text-indigo-800 font-semibold">← Kembali ke Beranda</a>
            </div>
            <div class="grid gap-12 lg:grid-cols-[1.25fr_0.85fr] items-start">
                <div class="space-y-8">
                    <div class="overflow-hidden rounded-[2rem] shadow-2xl bg-slate-100">
                        @if($event->poster_path)
                            <img src="{{ asset('storage/' . $event->poster_path) }}" alt="{{ $event->title }}" class="w-full h-[520px] object-cover">
                        @else
                            <div class="w-full h-[520px] flex items-center justify-center text-slate-400 text-xl">Poster event tidak tersedia</div>
                        @endif
                    </div>

                    <div class="rounded-[2rem] bg-white p-8 shadow-sm border border-slate-100">
                        <h1 class="text-4xl font-extrabold text-slate-900 mb-4">{{ $event->title }}</h1>
                        <div class="flex flex-wrap gap-4 text-slate-500 mb-6">
                            <span><strong>Tanggal:</strong> {{ \Carbon\Carbon::parse($event->date)->translatedFormat('d F Y, H:i') }}</span>
                            <span><strong>Lokasi:</strong> {{ $event->location }}</span>
                            <span><strong>Kategori:</strong> {{ $event->category->name ?? 'Umum' }}</span>
                            <span><strong>Stok:</strong> {{ $event->stock }}</span>
                        </div>
                        <p class="text-slate-600 leading-relaxed">{{ $event->description ?? 'Deskripsi belum tersedia untuk event ini.' }}</p>
                    </div>
                </div>

                <aside class="space-y-6">
                    <div class="rounded-[2.5rem] bg-white p-8 shadow-sm border border-slate-100">
                        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                            <div>
                                <p class="text-sm uppercase tracking-[0.24em] font-bold text-slate-400">Harga Tiket</p>
                                <p class="text-3xl font-black text-indigo-600">{{ $event->price == 0 ? 'Gratis' : 'Rp ' . number_format($event->price, 0, ',', '.') }}</p>
                            </div>
                            <span class="inline-flex items-center rounded-full bg-indigo-50 px-4 py-2 text-sm font-bold text-indigo-700">{{ $event->stock > 0 ? 'Tiket Tersedia' : 'Habis' }}</span>
                        </div>

                        <div class="rounded-3xl bg-slate-50 p-5">
                            <p class="text-sm text-slate-500">Pastikan detail event dan jumlah tiket sebelum melanjutkan.</p>
                        </div>

                        <a href="{{ route('checkout.create', $event) }}" class="inline-flex w-full items-center justify-center rounded-[2rem] bg-indigo-600 px-6 py-4 text-white font-bold shadow-lg shadow-indigo-200/40 hover:bg-indigo-700 transition">
                            Beli Tiket Sekarang
                        </a>
                    </div>

                    <div class="rounded-[2.5rem] bg-indigo-600 p-8 text-white shadow-lg shadow-indigo-200/20">
                        <h4 class="text-xl font-bold">Info Tambahan</h4>
                        <p class="mt-4 text-sm leading-relaxed text-indigo-100">Pembayaran akan diproses setelah transaksi dibuat. Status transaksi akan muncul di dashboard admin.</p>
                    </div>
                </aside>
            </div>
        </div>
    </section>
@endsection
