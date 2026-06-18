@extends('layouts.admin')

@section('page_title', 'Laporan Transaksi')
@section('page_subtitle', 'Pantau arus kas dan penjualan tiket Anda.')

@section('content')
    <div class="rounded-[2.5rem] bg-white p-8 shadow-sm border border-slate-100">
        <div class="mb-8 flex flex-col gap-4 md:flex-row md:items-center md:justify-between">
            <div>
                <h2 class="text-3xl font-extrabold text-slate-900">Transaksi</h2>
                <p class="text-sm text-slate-500">Riwayat transaksi terbaru dari pemesanan tiket event.</p>
            </div>
            <div class="inline-flex items-center gap-2 rounded-full bg-slate-100 px-4 py-3 text-sm font-semibold text-slate-600">
                Total transaksi: <span class="ml-2 font-black text-slate-900">{{ $transactions->total() }}</span>
            </div>
        </div>

        <div class="overflow-hidden rounded-[2rem] border border-slate-200 shadow-sm">
            <table class="min-w-full divide-y divide-slate-200 bg-white text-left text-sm">
                <thead class="bg-slate-50">
                    <tr>
                        <th class="px-6 py-4 font-semibold text-slate-600">Order ID</th>
                        <th class="px-6 py-4 font-semibold text-slate-600">Detail Pembeli</th>
                        <th class="px-6 py-4 font-semibold text-slate-600">Event</th>
                        <th class="px-6 py-4 font-semibold text-slate-600">Tgl Transaksi</th>
                        <th class="px-6 py-4 font-semibold text-slate-600">Status</th>
                        <th class="px-6 py-4 font-semibold text-slate-600 text-right">Total Tagihan</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200">
                    @forelse($transactions as $transaction)
                        <tr class="hover:bg-slate-50 transition">
                            <td class="px-6 py-4 font-semibold text-slate-900">{{ $transaction->order_id }}</td>
                            <td class="px-6 py-4">
                                <p class="font-bold text-slate-800">{{ $transaction->customer_name }}</p>
                                <p class="text-xs text-slate-500">{{ $transaction->customer_email }}<br>{{ $transaction->customer_phone }}</p>
                            </td>
                            <td class="px-6 py-4">
                                <div class="font-semibold text-slate-900">{{ $transaction->event->title ?? '-' }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-slate-500">{{ $transaction->created_at->format('d M Y, H:i') }}</td>
                            <td class="px-6 py-4">
                                @php
                                    $status = strtolower($transaction->status);
                                @endphp
                                <span class="inline-flex items-center rounded-full px-3 py-1 text-xs font-semibold uppercase tracking-[0.15em] 
                                    {{ $status === 'pending' ? 'bg-amber-100 text-amber-700' : ($status === 'success' ? 'bg-emerald-100 text-emerald-700' : 'bg-rose-100 text-rose-700') }}">
                                    {{ $transaction->status }}
                                </span>
                            </td>
                            <td class="px-6 py-4 text-slate-500">{{ $transaction->created_at->translatedFormat('d M Y H:i') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-slate-500">Belum ada transaksi yang tercatat.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="mt-8">
            {{ $transactions->links() }}
        </div>
    </div>
@endsection
