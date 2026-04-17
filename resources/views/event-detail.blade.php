@extends('layouts.app')

@section('content')
    <div class="container mt-4">
        <h1>Judul Event Detail</h1>
        <img src="dummy-image.jpg" alt="Poster Event" class="img-fluid mb-3">
        
        <p><strong>Tanggal:</strong> 20 April 2026</p>
        <p><strong>Lokasi:</strong> Surakarta, Central Java</p>
        <p><strong>Deskripsi:</strong> Ini adalah deskripsi detail tentang acara tersebut. Anda bisa meletakkan elemen HTML prototype Anda di sini.</p>
        
        <a href="/checkout" class="btn btn-success">Beli Tiket</a>
    </div>
@endsection