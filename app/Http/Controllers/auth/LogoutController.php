<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
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
