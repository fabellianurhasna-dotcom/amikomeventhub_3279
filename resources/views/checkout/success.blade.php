@extends('layouts.app') @section('content')
<div class="py-16 max-w-xl mx-auto px-4 text-center">
    <div class="bg-white rounded-[2.5rem] border border-slate-100 p-10 shadow-sm">
        <div class="w-20 h-20 bg-emerald-50 text-emerald-500 rounded-full flex items-center justify-center mx-auto mb-6 shadow-sm">
            <svg class="w-10 h-10" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
            </svg>
        </div>
        
        <h2 class="text-3xl font-black text-slate-800 mb-2">Pembayaran Sukses!</h2>
        <p class="text-slate-500 mb-8 text-sm leading-relaxed">Terima kasih, pembayaran tiket untuk event <strong class="text-slate-700">{{ $transaction->event->title }}</strong> telah kami terima. Detail tiket resmi telah dikirimkan ke email Anda.</p>
        
        <div class="bg-slate-50 rounded-2xl p-5 mb-8 text-left border border-slate-100/80 space-y-3">
            <div class="flex justify-between items-center pb-2 border-b border-slate-200/60 text-xs font-bold text-slate-400 uppercase tracking-wider">
                <span>Ringkasan Invoice</span>
                <span class="text-emerald-600 bg-emerald-50 px-2.5 py-0.5 rounded-full text-[10px]">Paid</span>
            </div>
            <div class="flex justify-between text-sm">
                <span class="text-slate-400 font-medium">Order ID:</span>
                <span class="font-bold text-slate-700">{{ $transaction->order_id }}</span>
            </div>
            <div class="flex justify-between text-sm">
                <span class="text-slate-400 font-medium">Nama Pembeli:</span>
                <span class="font-semibold text-slate-700">{{ $transaction->customer_name }}</span>
            </div>
            <div class="flex justify-between items-center pt-2 border-t border-slate-200/60">
                <span class="text-sm font-bold text-slate-800">Total Bayar:</span>
                <span class="text-xl font-black text-indigo-600">Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</span>
            </div>
        </div>

        <a href="{{ route('home') }}" class="inline-block w-full py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-2xl shadow-lg shadow-indigo-100 transition duration-200">
            Kembali ke Beranda
        </a>
    </div>
</div>
@endsection