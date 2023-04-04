<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Seeder;

class CommunicationsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('communications')->insert([
            [
                'id' => '1',
                'contact_id' => '1',
                'type' => 'email',
                'subject' => 'Sveiki',
                'message' => 'Nu tai laba diena.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => '2',
                'contact_id' => '2',
                'type' => 'sms',
                'subject' => 'Rašau sms',
                'message' => 'sms išsiųstas.',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
