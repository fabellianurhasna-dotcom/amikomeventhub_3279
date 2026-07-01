<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Midtrans\Config;
use Midtrans\Snap;

class OrderController extends Controller
{
    public function __construct()
    {
        // Konfigurasi Midtrans
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION');
        Config::$isSanitized = env('MIDTRANS_IS_SANITIZED');
        Config::$is3ds = env('MIDTRANS_IS_3DS');
    }

    public function checkout()
    {
        // 1. Data Transaksi Simulasi
        $orderId = 'INV-' . uniqid();
        $grossAmount = 150000; // Contoh harga tiket Rp 150.000

        $transaction_details = [
            'order_id' => $orderId,
            'gross_amount' => $grossAmount,
        ];

        // 2. Data Pelanggan (Kita pisah nama depan & belakang untuk dikirim ke Midtrans)
        $firstName = 'Budi';
        $lastName = 'Utomo';

        $customer_details = [
            'first_name' => $firstName,
            'last_name' => $lastName,
            'email' => 'budi.utomo@mail.com',
            'phone' => '081234567890',
        ];

        // 3. Gabungkan Parameter
        $params = [
            'transaction_details' => $transaction_details,
            'customer_details' => $customer_details,
        ];

        try {
            // 4. Dapatkan Snap Token dari Midtrans
            $snapToken = Snap::getSnapToken($params);
            
            // Membuat variabel gabungan nama untuk ditampilkan di halaman Checkout Blade
            $customerName = $firstName . ' ' . $lastName;

            // 5. Passing semua token dan data ke halaman Blade view
            return view('checkout', compact('snapToken', 'orderId', 'grossAmount', 'customerName'));
        } catch (\Exception $e) {
            return $e->getMessage();
        }
    }
}