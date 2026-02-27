<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Teacher;
use App\Models\Classroom;

class TeacherSeeder extends Seeder
{
    public function run(): void
    {
        $classrooms = Classroom::pluck('id');

        if ($classrooms->isEmpty()) {
            return;
        }

        $subjects = ['Math', 'Science', 'English', 'History', 'Physics', 'Chemistry'];
        $roles = ['Teacher', 'Principal'];

        for ($i = 0; $i < 10; $i++) {
            Teacher::create([
                'name' => fake()->name(),
                'role' => $roles[array_rand($roles)],
                'classroom_id' => $classrooms->random(),
                'subject' => $subjects[array_rand($subjects)],
                'salary' => fake()->numberBetween(40000, 80000),
                'phone_no' => fake()->phoneNumber(),
                'address' => fake()->address(),
            ]);
        }
    }
}