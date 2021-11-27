<?php

namespace Database\Seeders;

use App\Models\Course;
use Illuminate\Database\Seeder;

class CourseSeeder extends Seeder
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
                "title" => "Basic PHP",
            ],
            [
                "title" => "R fundamental",
            ],
            [
                "title" => "Python fundamental",
            ]
        ];

        foreach ($data as $key => $value) {
            Course::insert($value);
        }
    }
}
