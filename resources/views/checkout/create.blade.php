@extends('layouts.app')
@section('title', 'Checkout - ' . $event->title)

@section('content')
    <section class="min-h-screen bg-slate-50 py-20">
        <div class="max-w-7xl mx-auto px-6">
            <div class="mb-10 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
                <div>
                    <p class="text-sm uppercase tracking-[0.3em] font-bold text-indigo-600">Checkout</p>
                    <h1 class="text-4xl font-extrabold text-slate-900">Detail Pembayaran Tiket</h1>
                </div>
                <a href="{{ route('event.show', $event) }}" class="inline-flex items-center gap-2 rounded-full border border-slate-200 bg-white px-5 py-3 text-sm font-semibold text-slate-700 hover:bg-slate-100 transition">
                    Kembali ke Event
                </a>
            </div>

            @if(session('success'))
                <div class="mb-6 rounded-[2rem] border border-emerald-100 bg-emerald-50 p-5 text-emerald-700 shadow-sm">
                    {{ session('success') }}
                </div>
            @endif

            @if(session('error'))
                <div class="mb-6 rounded-[2rem] border border-rose-100 bg-rose-50 p-5 text-rose-700 shadow-sm">
                    {{ session('error') }}
                </div>
            @endif

            @if($errors->any())
                <div class="mb-6 rounded-[2rem] border border-amber-100 bg-amber-50 p-5 text-amber-700 shadow-sm">
                    <ul class="list-disc list-inside space-y-1">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="grid gap-8 lg:grid-cols-[1.3fr_0.95fr]">
                <div class="rounded-[2.5rem] bg-white p-8 shadow-sm border border-slate-100">
                    <h2 class="text-2xl font-bold text-slate-900 mb-6">Informasi Pembeli</h2>

                    <form action="{{ route('checkout.store', $event) }}" method="POST" class="space-y-6">
                        @csrf

                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-slate-700" for="customer_name">Nama Lengkap</label>
                            <input id="customer_name" name="customer_name" type="text" value="{{ old('customer_name') }}" class="w-full rounded-3xl border border-slate-200 bg-slate-50 px-5 py-4 text-slate-900 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100" placeholder="Masukkan nama lengkap" required>
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-slate-700" for="customer_email">Email</label>
                            <input id="customer_email" name="customer_email" type="email" value="{{ old('customer_email') }}" class="w-full rounded-3xl border border-slate-200 bg-slate-50 px-5 py-4 text-slate-900 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100" placeholder="Masukkan email aktif" required>
                        </div>

                        <div class="space-y-2">
                            <label class="text-sm font-semibold text-slate-700" for="customer_phone">Nomor Telepon</label>
                            <input id="customer_phone" name="customer_phone" type="text" value="{{ old('customer_phone') }}" class="w-full rounded-3xl border border-slate-200 bg-slate-50 px-5 py-4 text-slate-900 outline-none transition focus:border-indigo-500 focus:ring-2 focus:ring-indigo-100" placeholder="Contoh: 081234567890" required>
                        </div>

                        <button type="submit" class="w-full rounded-[2rem] bg-indigo-600 px-6 py-4 text-base font-bold text-white shadow-lg shadow-indigo-200/40 hover:bg-indigo-700 transition">
                            Lanjut Pembayaran
                        </button>
                    </form>
                </div>

                <div class="space-y-6">
                    <div class="rounded-[2.5rem] bg-white p-8 shadow-sm border border-slate-100">
                        <div class="mb-6 flex flex-col gap-4 sm:flex-row sm:items-center sm:justify-between">
                            <div>
                                <p class="text-sm uppercase tracking-[0.3em] font-bold text-indigo-600">Ringkasan Event</p>
                                <h3 class="text-2xl font-bold text-slate-900">{{ $event->title }}</h3>
                            </div>
                            <span class="inline-flex items-center rounded-full bg-indigo-50 px-4 py-2 text-sm font-semibold text-indigo-700">{{ $event->stock > 0 ? 'Tersedia' : 'Habis' }}</span>
                        </div>

                        <div class="overflow-hidden rounded-[2rem] bg-slate-100">
                            @if($event->poster_path)
                                <img src="{{ asset('storage/' . $event->poster_path) }}" alt="{{ $event->title }}" class="h-64 w-full object-cover">
                            @else
                                <div class="flex h-64 items-center justify-center text-slate-400">Poster tidak tersedia</div>
                            @endif
                        </div>

                        <div class="mt-8 space-y-4">
                            <div class="flex items-center justify-between text-sm text-slate-500">
                                <span>Harga Tiket</span>
                                <span class="font-semibold text-slate-900">{{ $event->price == 0 ? 'Gratis' : 'Rp ' . number_format($event->price, 0, ',', '.') }}</span>
                            </div>
                            <div class="flex items-center justify-between text-sm text-slate-500">
                                <span>Biaya layanan</span>
                                <span class="font-semibold text-slate-900">Rp 5.000</span>
                            </div>
                            <div class="border-t border-slate-200 pt-4">
                                <div class="flex items-center justify-between text-base font-bold text-slate-900">
                                    <span>Total Pembayaran</span>
                                    <span>{{ $event->price == 0 ? 'Rp ' . number_format(5000, 0, ',', '.') : 'Rp ' . number_format($event->price + 5000, 0, ',', '.') }}</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="rounded-[2.5rem] bg-indigo-600 p-8 text-white shadow-lg shadow-indigo-200/20">
                        <h4 class="text-xl font-bold">Perhatian</h4>
                        <p class="mt-4 text-sm leading-relaxed text-indigo-100">Pastikan data pemesanan sudah benar. Transaksi yang sudah selesai dibuat akan tersimpan di dashboard admin.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
