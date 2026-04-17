@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h2>Halaman Checkout</h2>
        <div class="row">
            <div class="col-md-8">
                <h4>Informasi Pembeli</h4>
                <form>
                    <div class="mb-3">
                        <label>Nama Lengkap</label>
                        <input type="text" class="form-control" placeholder="Masukkan nama">
                    </div>
                </form>
            </div>
            <div class="col-md-4">
                <h4>Ringkasan Pesanan</h4>
                <p>1x Tiket Event Dummy</p>
                <p><strong>Total: Rp 150.000</strong></p>
                <a href="/ticket" class="btn btn-primary w-100">Bayar Sekarang</a>
            </div>
        </div>
    </div>
@endsection