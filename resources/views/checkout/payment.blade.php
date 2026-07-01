@extends('layouts.app') @section('content')
<div class="py-12 max-w-xl mx-auto px-4 text-center">
    <div class="bg-white rounded-3xl border border-slate-100 p-8 shadow-sm">
        <div class="w-16 h-16 bg-indigo-50 text-indigo-600 rounded-full flex items-center justify-center mx-auto mb-6">
            <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
        </div>
        
        <h2 class="text-2xl font-black text-slate-800 mb-2">Invoice Pembayaran Berhasil Dibuat</h2>
        <p class="text-slate-500 mb-6 text-sm">Klik tombol di bawah untuk menyelesaikan pembayaran tiket event <strong>{{ $event->title }}</strong></p>
        
        <div class="bg-slate-50 rounded-2xl p-4 mb-8 text-left border border-slate-100">
            <div class="flex justify-between text-xs font-bold text-slate-400 uppercase tracking-wider mb-2">
                <span>Order ID</span>
                <span>Total Bayar</span>
            </div>
            <div class="flex justify-between font-bold text-slate-700">
                <span>{{ $transaction->order_id }}</span>
                <span class="text-indigo-600 text-lg">Rp {{ number_format($transaction->total_price, 0, ',', '.') }}</span>
            </div>
        </div>

        <button id="pay-button" class="w-full py-4 bg-indigo-600 hover:bg-indigo-700 text-white font-bold rounded-2xl shadow-lg shadow-indigo-100 transition duration-200">
            Bayar Sekarang via Midtrans
        </button>
    </div>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>

<script type="text/javascript">
    var payButton = document.getElementById('pay-button');
    payButton.addEventListener('click', function () {
        // Memicu jendela pop-up Midtrans keluar otomatis menggunakan snapToken
        window.snap.pay('{{ $snapToken }}', {
            onSuccess: function(result){
                alert("Pembayaran Berhasil!"); 
                window.location.href = "/";
            },
            onPending: function(result){
                alert("Menunggu Pembayaran!"); 
                window.location.href = "/";
            },
            onError: function(result){
                alert("Pembayaran Gagal!"); 
                window.location.href = "/";
            },
            onClose: function(){
                alert('Anda menutup halaman pembayaran sebelum transaksi selesai.');
            }
        });
    });
</script>
@endsection