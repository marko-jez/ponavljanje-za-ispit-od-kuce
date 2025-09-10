<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index() {
        $user = '';
        if(Auth::check()) {
            $user = Auth::user()->name;
        }
        return view('login.login', compact('user'));
    }

    public function process(Request $request) {
        $credentials = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:4'
        ], 
        [
            'email.required' => 'Molimo vas unesite lozinku',
            'email.email' => 'Molimo vas unesite validni email',
            'password.required' => 'Molimo vas unesite lozinku',
            'password.min' => 'Lozinka mora biti najmanje 4 znaka'
        ]);

        if(Auth::attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended('/prijava');
        }
        return back()->withErrors(['login_error' => 'Prrijava neuspješna. Molimo pokušajte ponovno'])->onlyInput('email');
    }

    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/prijava');
    }
}
