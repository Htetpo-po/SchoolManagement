<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // ----------- Admin Users -----------
        User::create([
            'name' => 'Admin One',
            'phone' => '0910000001',
            'password' => Hash::make('12345'), // simple password
            'role_id' =>1,
        ]);

        User::create([
            'name' => 'Admin Two',
            'phone' => '0910000002',
            'password' => Hash::make('12345'), // simple password
            'role_id' =>1,
        ]);

        // ----------- Teacher Users -----------
        User::create([
            'name' => 'Teacher One',
            'phone' => '0920000001',
            'password' => Hash::make('12345'), // simple password
            'role_id' =>2,
        ]);

        User::create([
            'name' => 'Teacher Two',
            'phone' => '0920000002',
            'password' => Hash::make('12345'), // simple password
            'role_id' =>2,
        ]);
    }
}