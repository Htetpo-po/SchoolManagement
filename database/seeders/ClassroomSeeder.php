<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ClassroomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Define classrooms from KG to Grade 12
        $classrooms = [
            'KG', 
            'Grade 1', 'Grade 2', 'Grade 3', 'Grade 4', 'Grade 5', 
            'Grade 6', 'Grade 7', 'Grade 8', 'Grade 9', 'Grade 10', 
            'Grade 11', 'Grade 12'
        ];

        // Insert into 'classrooms' table
        foreach ($classrooms as $classroom) {
            DB::table('classrooms')->insert([
                'class_name' => $classroom,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

        $this->command->info('Classrooms seeded successfully!');
    }
}