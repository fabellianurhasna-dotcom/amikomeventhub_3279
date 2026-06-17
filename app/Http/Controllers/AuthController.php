<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin/dashboard');
        }

        return back()->withErrors([
            'email' => 'Email atau password yang Anda masukkan salah.',
        ]);
    }

    /**
     * Fungsi untuk Log out Admin
     */
    public function logout(Request $request)
    {
        // Proses logout dari sistem
        Auth::logout();

        // Menghapus data session user lama
        $request->session()->invalidate();

        // Membuat ulang token CSRF baru demi keamanan
        $request->session()->regenerateToken();

        // Mengalihkan pengguna kembali ke halaman login
        return redirect('/admin/login')->with('success', 'Anda telah berhasil logout.');
    }
}