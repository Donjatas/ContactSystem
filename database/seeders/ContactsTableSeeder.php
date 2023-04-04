<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
{
    DB::table('contacts')->insert([
        [
            'name' => 'John Doe',
            'phone' => '1234567890',
            'email' => 'john.doe@example.com',
            'user_id' => 1,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        [
            'name' => 'Jane Doe',
            'phone' => '0987654321',
            'email' => 'jane.doe@example.com',
            'user_id' => 2,
            'created_at' => now(),
            'updated_at' => now(),
        ],
        // Add more contacts as needed
    ]);
}

}
