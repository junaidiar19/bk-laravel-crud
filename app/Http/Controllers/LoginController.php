<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Menampilkan halaman login
     */
    public function index()
    {
        return view('login');
    }

    /**
     * Proses login
     */
    public function store(Request $request)
    {
        // Get credentials
        $credentials = $request->only('email', 'password');

        // Cek credentials
        if (Auth::attempt($credentials)) {

            // Autentikasi berhasil
            $request->session()->regenerate();

            // Redirect ke halaman profil
            return to_route('profile');
        }

        // Autentikasi gagal
        return back()->withErrors([
            'error' => 'Email atau password salah',
        ])->withInput();
    }

    /**
     * Logout
     */
    public function destroy()
    {
        // Hapus session auth 
        Auth::logout();

        // redirect ke halaman login
        return to_route('login');
    }
}
