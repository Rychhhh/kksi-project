<?php

namespace Database\Seeders;

use App\Models\Materi;
use Illuminate\Database\Seeder;

class MateriSeeder extends Seeder
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
                'title' => 'Cara menampilkan text di PHP',
                'created_by'  => '1',
                'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel vero iusto consequuntur architecto voluptates, id blanditiis quaerat et aliquid officia esse quis, adipisci odio ipsa illum reprehenderit voluptatibus quas quia.',
                'course_id' => '1'
            ],
            [
                'title' => 'Mengenal apa itu variabel PHP',
                'created_by'  => '1',
                'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel vero iusto consequuntur architecto voluptates, id blanditiis quaerat et aliquid officia esse quis, adipisci odio ipsa illum reprehenderit voluptatibus quas quia.',
                'course_id' => '1'
            ],
            [
                'title' => 'Membuat array di PHP',
                'created_by'  => '1',
                'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel vero iusto consequuntur architecto voluptates, id blanditiis quaerat et aliquid officia esse quis, adipisci odio ipsa illum reprehenderit voluptatibus quas quia.',
                'course_id' => '1'
            ],
            [
                'title' => 'Apa itu R',
                'created_by'  => '1',
                'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel vero iusto consequuntur architecto voluptates, id blanditiis quaerat et aliquid officia esse quis, adipisci odio ipsa illum reprehenderit voluptatibus quas quia.',
                'course_id' => '2'
            ],
            [
                'title' => 'Cara kerja R',
                'created_by'  => '1',
                'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel vero iusto consequuntur architecto voluptates, id blanditiis quaerat et aliquid officia esse quis, adipisci odio ipsa illum reprehenderit voluptatibus quas quia.',
                'course_id' => '2'
            ],
            [
                'title' => 'Looping Python',
                'created_by'  => '1',
                'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel vero iusto consequuntur architecto voluptates, id blanditiis quaerat et aliquid officia esse quis, adipisci odio ipsa illum reprehenderit voluptatibus quas quia.',
                'course_id' => '3'
            ],
            [
                'title' => 'Variable di Python',
                'created_by'  => '1',
                'content' => 'Lorem ipsum dolor sit, amet consectetur adipisicing elit. Vel vero iusto consequuntur architecto voluptates, id blanditiis quaerat et aliquid officia esse quis, adipisci odio ipsa illum reprehenderit voluptatibus quas quia.',
                'course_id' => '3'
            ],
        ];

        foreach ($data as $key => $value) {
            Materi::insert($value);
        }
    }
}
