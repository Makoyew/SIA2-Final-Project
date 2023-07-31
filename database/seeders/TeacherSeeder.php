<?php

namespace Database\Seeders;

use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Teacher::factory(10)->create();

        $teacher = [
            [
                'last_name' => 'Mueblas',
                'first_name' => 'Juliefa',
                'address' => 'Tinangnan, Tubigon, Bohol',
                'phone' => '09308239965',
                'bdate' => '1992-02-01',
                'grade' => '4',
                'rank' => 'Teacher 3',
                'email' => 'sumipo231@gmail.com'
            ],
        ];

        foreach($teacher as $t) {
            Teacher::create($t);
        }
    }
}
