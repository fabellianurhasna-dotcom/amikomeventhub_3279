<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Event;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
        $totalPrice = $event->price + 5000;

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

        return redirect('/')->with('success', 'Transaksi berhasil dibuat. Silakan cek email untuk detail pembayaran.');
    }
}
