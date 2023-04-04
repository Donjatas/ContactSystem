<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    DB::table('users')->insert([
        [
            'id' => 1,
            'name' => 'John',
            'lastname' => 'Doe',
            'phone' => '1234567890',
            'email' => 'john.doe@example.com',
            'password' => Hash::make('123456789'),
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'id' => 2,
            'name' => 'Jane',
            'lastname' => 'Doe',
            'phone' => '0987654321',
            'email' => 'jane.doe@example.com',
            'password' => Hash::make('123456789'),
            'created_at' => now(),
            'updated_at' => now(),
        ],
        // Add more contacts as needed
    ]);
}

}
