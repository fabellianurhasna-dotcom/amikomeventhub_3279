@extends('layouts.app')

@section('content')
    <script type="text/javascript" src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>

    <div class="container mt-4">
        <h2>Halaman Checkout</h2>
        <div class="row">
            <div class="col-md-8">
                <h4>Informasi Pembeli</h4>
                <form>
                    <div class="mb-3">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" value="{{ $customerName ?? '' }}" placeholder="Masukkan nama" readonly>
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <h4>Ringkasan Pesanan</h4>
                <p class="text-muted"><small>Order ID: {{ $orderId }}</small></p>
                <p>1x Tiket Event Dummy</p>
                <p><strong>Total: Rp {{ number_format($grossAmount, 0, ',', '.') }}</strong></p>
                
                <button id="pay-button" class="btn btn-primary w-100">Bayar Sekarang</button>
            </div>
        </div>
    </div>

    <script type="text/javascript">
        var payButton = document.getElementById('pay-button');
        payButton.addEventListener('click', function (e) {
            e.preventDefault(); // Mencegah reload halaman
            
            window.snap.pay('{{ $snapToken }}', {
                onSuccess: function(result){
                    alert("Pembayaran Berhasil!"); 
                    console.log(result);
                    // Anda bisa arahkan user ke halaman sukses, contoh:
                    // window.location.href = '/pembayaran-sukses';
                },
                onPending: function(result){
                    alert("Menunggu Pembayaran!"); 
                    console.log(result);
                },
                onError: function(result){
                    alert("Pembayaran Gagal!"); 
                    console.log(result);
                },
                onClose: function(){
                    alert('Anda menutup halaman pembayaran sebelum selesai.');
                }
            });
        });
    </script>
@endsection