<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
    public function index()
    {
        // Tampilan untuk view login
        return view('auth.login');
    }
   
    public function authenticate(Request $request) {
        
        $login = $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        $rm = $request->has('remember me') ? true : false;

        if(Auth::attempt($login, $rm)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        throw ValidationException::withMessages([
            'username' => 'Your provide credentials does not match our record',
            'password' => 'Your provide credentials does not match our record',
          ]);
    
        return back()->with('loginGagal', 'Login Gagal. Jika Anda belum punya akun, silakan register.');
    }
}
