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
        [
            'id' => 10,
            'name' => 'Mama',
            'lastname' => 'Ode',
            'phone' => '0987654321',
            'email' => 'mama.ode@example.com',
            'password' => Hash::make('123456789'),
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'id' => 11,
            'name' => 'Žiogas',
            'lastname' => 'Smuikelis',
            'phone' => '0987654321',
            'email' => 'ziogas@example.com',
            'password' => Hash::make('123456789'),
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'id' => 12,
            'name' => 'Obolys',
            'lastname' => 'Nukirto',
            'phone' => '0987654321',
            'email' => 'obolys@example.com',
            'password' => Hash::make('123456789'),
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'id' => 13,
            'name' => 'Eivydas',
            'lastname' => 'Musiliauskas',
            'phone' => '0987654321',
            'email' => 'Eivydas@example.com',
            'password' => Hash::make('123456789'),
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'id' => 14,
            'name' => 'Vitalija',
            'lastname' => 'Bunkė',
            'phone' => '0987654321',
            'email' => 'bunke@example.com',
            'password' => Hash::make('123456789'),
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'id' => 15,
            'name' => 'Lukas',
            'lastname' => 'Lakštinis',
            'phone' => '0987654321',
            'email' => 'Lakstinukas@example.com',
            'password' => Hash::make('123456789'),
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'id' => 16,
            'name' => 'Indrė',
            'lastname' => 'Kažkas',
            'phone' => '0987654321',
            'email' => 'indrė@example.com',
            'password' => Hash::make('123456789'),
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'id' => 17,
            'name' => 'Julija',
            'lastname' => 'Drink',
            'phone' => '0987654321',
            'email' => 'julija@example.com',
            'password' => Hash::make('123456789'),
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'id' => 18,
            'name' => 'OMG',
            'lastname' => 'OG',
            'phone' => '0987654321',
            'email' => 'OG@example.com',
            'password' => Hash::make('123456789'),
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'id' => 19,
            'name' => 'Alan',
            'lastname' => 'Moonwalker',
            'phone' => '0987654321',
            'email' => 'alan@example.com',
            'password' => Hash::make('123456789'),
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'id' => 22,
            'name' => 'Bilis',
            'lastname' => 'Fuksas',
            'phone' => '0987654321',
            'email' => 'bilis@example.com',
            'password' => Hash::make('123456789'),
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'id' => 23,
            'name' => 'Reinas',
            'lastname' => 'Kundrotas',
            'phone' => '0987654321',
            'email' => 'Reinas@example.com',
            'password' => Hash::make('123456789'),
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'id' => 24,
            'name' => 'Hill',
            'lastname' => 'King',
            'phone' => '0987654321',
            'email' => 'Hill@example.com',
            'password' => Hash::make('123456789'),
            'created_at' => now(),
            'updated_at' => now(),
        ],
    ]);
}

}
