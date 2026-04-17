@extends('layouts.app')

@section('content')
    <div class="container mt-4 text-center">
        <div class="ticket-wrapper border p-5 mx-auto" style="max-width: 500px;">
            <h2 class="text-success">Pembayaran Berhasil!</h2>
            <hr>
            <h4>E-Ticket Anda</h4>
            <p><strong>Nama Event:</strong> Event Dummy 1</p>
            <p><strong>Kode Booking:</strong> #EVT-2026-ABC</p>
            <div class="qr-code mt-4">
                <img src="dummy-qr.png" alt="QR Code" style="width: 150px;">
            </div>
            <button class="btn btn-outline-secondary mt-4">Download Tiket</button>
        </div>
    </div>
@endsection