<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Faker\Factory as Faker;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $faker = Faker::create();

        // Mapping grades to classroom IDs (assuming KG=1, Grade1=2, etc.)
        $grades = [
            'KG' => 53,
            'Grade 1' => 89,
            'Grade 2' => 78,
            'Grade 3' => 59,
            'Grade 4' => 102,
            'Grade 5' => 86,
            'Grade 6' => 100,
            'Grade 7' => 123,
            'Grade 8' => 45,
            'Grade 9' => 43,
            'Grade 10' => 43,
            'Grade 11' => 41,
            'Grade 12' => 75,
        ];

        $classroomId = 1; // Default classroom_id if you don’t have separate IDs

        foreach ($grades as $grade => $count) {
            for ($i = 0; $i < $count; $i++) {
                DB::table('students')->insert([
                    'name' => $faker->name(),
                    'father' => $faker->name('male'),
                    'mother' => $faker->name('female'),
                    'classroom_id' => $classroomId, // you can map grade to id if needed
                    'phone_no' => $faker->phoneNumber(),
                    'address' => $faker->address(),
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            $classroomId++; // Increment classroom_id for next grade (optional)
        }
    }
}