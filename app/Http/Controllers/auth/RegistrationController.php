<?php

namespace App\Http\Controllers\auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\UserCredential;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RegistrationController extends Controller
{
    public function index()
    {
        // Tampilan register
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validateData = $request->validate([
            "name" => "required",
            "email" => "required|email",
            "password" => "required|min:4"
        ]);

        $validateData['password'] = bcrypt($validateData['password']);

        $login = User::create($validateData);

        $user_id = User::select('id')->where('email', $request['email'])->get();

        foreach ($user_id as $id) {
            $data = [
                [
                    'user_id' => $id['id']
                ],
            ];

            foreach ($data as $value) {
                UserCredential::insert($value);
            }
        }

        Auth::login($login);

        return redirect('/dashboard')->with('success', 'Anda berhasil register !!!');
    }
}
