<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            // Jika login berhasil, alihkan ke halaman yang sesuai
            return redirect()->intended('/dashboard');
        } else {
            // Jika login gagal, kembali ke halaman login dengan pesan error
            return back()->withErrors(['username' => 'Login failed. Please check your credentials.']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
