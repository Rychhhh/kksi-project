<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function registerView()
    {
        // Tampilan register
        return view('auth.register');
    }

    public function registerStore(Request $request)
    {
        $validateData = $request->validate([
            "name" => "required",
            "email" => "required",
            "password" => "required"
        ]);

        $validateData['password'] = bcrypt($validateData['password']);

        $login = User::create($validateData);

        Auth::login($login);

        return redirect('/dashboard')->with('success', 'Anda berhasil register !!!');
    }

    

    public function loginView()
    {
        // Tampilan untuk view login
        return view('auth.login');
    }
   
    public function authenticate(Request $request) {
        
        $login = $request->validate([
            "email" => "required",
            "password" => "required"
        ]);

        $rm = $request->has('remember me') ? true : false;

        if(Auth::attempt($login, $rm)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->with('loginGagal', 'Login Gagal. Jika Anda belum punya akun, silakan register.');
    }



    public function logout()
    {
        try {
            Auth::logout();
            return redirect('/')->with('success', 'Logout berhasil');
        } catch (\Throwable $th) {
            throw $th;
        }
    }
}
