<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Tampilan register
        return view('auth.register');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            "name" => "required",
            "email" => "required",
            "password" => "required"
        ]);

        $validateData['password'] = bcrypt($validateData['password']);

        User::create($validateData);

        return redirect('/login')->with('success', 'Anda berhasil register !!!');
    }
}
