<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
// Import library Midtrans
use Midtrans\Config;
use Midtrans\Snap;

class CheckoutController extends Controller
{
    public function create(Event $event)
    {
        $categories = Category::all();

        return view('checkout.create', compact('event', 'categories'));
    }

    public function store(Request $request, Event $event)
    {
        $request->validate([
            'customer_name'  => 'required|string|max:255',
            'customer_email' => 'required|email|max:255',
            'customer_phone' => 'required|string|max:30',
        ]);

        if ($event->stock <= 0) {
            return back()->with('error', 'Stok tiket untuk event ini sudah habis.')->withInput();
        }

        $orderId = 'TRX-' . now()->timestamp . '-' . Str::upper(Str::random(5));
        $totalPrice = $event->price + 5000; // Harga Tiket + Biaya Admin Rp 5.000

        // 1. Tetap simpan transaksi ke Database Anda dengan status 'Pending'
        $transaction = Transaction::create([
            'event_id'       => $event->id,
            'order_id'       => $orderId,
            'customer_name'  => $request->customer_name,
            'customer_email' => $request->customer_email,
            'customer_phone' => $request->customer_phone,
            'total_price'    => $totalPrice,
            'status'         => 'Pending',
        ]);

        $event->decrement('stock');

        // 2. Tambahkan Konfigurasi Midtrans Snap di sini
        Config::$serverKey = env('MIDTRANS_SERVER_KEY');
        Config::$isProduction = env('MIDTRANS_IS_PRODUCTION', false);
        Config::$isSanitized = true;
        Config::$is3ds = true;

        // 3. Menyusun parameter data pembeli & item untuk dikirim ke Midtrans
        $params = [
            'transaction_details' => [
                'order_id'     => $orderId,
                'gross_amount' => (int) $totalPrice,
            ],
            'customer_details' => [
                'first_name' => $request->customer_name,
                'email'      => $request->customer_email,
                'phone'      => $request->customer_phone,
            ],
            'item_details' => [
                [
                    'id'       => 'EVT-' . $event->id,
                    'price'    => (int) $event->price,
                    'quantity' => 1,
                    'name'     => Str::limit($event->title, 45), // Batasi panjang judul agar tidak error di Midtrans
                ],
                [
                    'id'       => 'FEE-ADMIN',
                    'price'    => 5000,
                    'quantity' => 1,
                    'name'     => 'Biaya Admin / Sistem',
                ]
            ]
        ];

        // 4. Request Snap Token dari Midtrans & tampilkan halaman pembayaran
        try {
            $snapToken = Snap::getSnapToken($params);
            
            // SIMPAN TOKEN KE DATABASE
            $transaction->snap_token = $snapToken;
            $transaction->save();
            
            // Mengarahkan ke view checkout.payment bawa snapToken & data transaksi
            return view('checkout.payment', compact('transaction', 'snapToken', 'event'));
            
        } catch (\Exception $e){
            // Jika midtrans gagal merespon karena salah key/jaringan, kembalikan dengan pesan error
            return back()->with('error', 'Gagal terhubung ke sistem pembayaran: ' . $e->getMessage())->withInput();
        }
    }

    /**
     * Menampilkan halaman sukses setelah bayar
     * Pastikan rute checkout.success di web.php terhubung ke method ini
     */
    public function success(Transaction $transaction)
    {
        // Memuat relasi data event agar bisa ditampilkan di halaman sukses
        $transaction->load('event');
        
        return view('checkout.success', compact('transaction'));
    }

    /**
     * Menangani callback notifikasi otomatis dari Midtrans untuk mengubah status menjadi Sukses
     */
    public function callback(Request $request)
    {
        // 1. Ambil payload notifikasi dari Midtrans
        $payload = $request->all();

        $orderId = $payload['order_id'] ?? null;
        $transactionStatus = $payload['transaction_status'] ?? null;
        $type = $payload['payment_type'] ?? null;
        $fraudStatus = $payload['fraud_status'] ?? null;

        // 2. Cari data transaksi di database berdasarkan order_id
        $transaction = Transaction::where('order_id', $orderId)->first();

        if (!$transaction) {
            return response()->json([
                'meta' => [
                    'code' => 404,
                    'message' => 'Transaksi tidak ditemukan'
                ]
            ], 404);
        }

        // 3. Logika penentuan perubahan status berdasarkan respon Midtrans
        if ($transactionStatus == 'capture') {
            if ($type == 'credit_card') {
                if ($fraudStatus == 'challenge') {
                    $transaction->status = 'Pending';
                } else {
                    $transaction->status = 'Sukses';
                }
            }
        } else if ($transactionStatus == 'settlement') {
            $transaction->status = 'Sukses'; // Berubah menjadi Sukses setelah dibayar (VA, GoPay, QRIS, dll)
        } else if ($transactionStatus == 'pending') {
            $transaction->status = 'Pending';
        } else if ($transactionStatus == 'deny' || $transactionStatus == 'expire' || $transactionStatus == 'cancel') {
            $transaction->status = 'Gagal';
        }

        // 4. Simpan perubahan ke database
        $transaction->save();

        return response()->json([
            'meta' => [
                'code' => 200,
                'message' => 'Midtrans Notification Handled Successfully'
            ]
        ]);
    }
}