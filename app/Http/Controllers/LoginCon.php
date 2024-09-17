<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginCon extends Controller
{
    public function showLoginForm()
    {
        if (Auth::check()) {
            // Jika sudah login, arahkan ke halaman 'penduduk'
            return redirect()->route('penduduk');
        }
        
        return view('login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('name','password');
        
        if (Auth::attempt($credentials)) {
            return redirect()->intended('penduduk');
        }

        return redirect('/')->withErrors(['name' => 'Nama Tidak Terdaftar']);
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
