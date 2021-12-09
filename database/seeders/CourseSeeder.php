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
                "total_materi" => '3'
            ],
            [
                "title" => "R fundamental",
                "total_materi" => '2'
            ],
            [
                "title" => "Python fundamental",
                "total_materi" => '2'
            ]
        ];

        foreach ($data as $key => $value) {
            Course::insert($value);
        }
    }
}
