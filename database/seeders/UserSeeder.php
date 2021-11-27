<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $data = [
            [
                "name" => "John",
                "email" => "johndoe@gmail.com",
                "password" => Hash::make(123),
                "role" => "admin" 
            ],
            [
                "name" => "Alex",
                "email" => "alex@gmail.com",
                "password" => Hash::make(123),
                "role" => "siswa" 
            ],
            [
                "name" => "Xiao",
                "email" => "xiao@gmail.com",
                "password" => Hash::make(123),
                "role" => "guru" 
            ]
        ];

        foreach ($data as $key => $value) {
            User::insert($value);
        }
    }
}
