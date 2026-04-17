@extends('layouts.admin')

@section('content')
    <div class="pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Daftar Transaksi</h1>
    </div>

    <div class="table-responsive">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>ID Transaksi</th>
                    <th>Pembeli</th>
                    <th>Event</th>
                    <th>Total</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>#TRX-001</td>
                    <td>Budi Santoso</td>
                    <td>Workshop Laravel</td>
                    <td>Rp 150.000</td>
                    <td><span class="badge bg-warning">Pending</span></td>
                </tr>
            </tbody>
        </table>
    </div>
@endsection