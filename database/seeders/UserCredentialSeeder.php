<?php

namespace Database\Seeders;

use App\Models\UserCredential;
use Illuminate\Database\Seeder;

class UserCredentialSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'user_id' => 1
            ],
            [
                'user_id' => 2
            ],
            [
                'user_id' => 3
            ],
        ];

        foreach ($data as $value) {
            UserCredential::insert($value);
        }    }
}
