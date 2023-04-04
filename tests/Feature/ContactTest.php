<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Event;
use Tests\TestCase;
use Carbon\Carbon;

class ContactTest extends TestCase
{
    use DatabaseMigrations;
    use DatabaseTransactions;

    protected $connection = 'testing';

    public function testCanFindContact()
    {
        $this->seed('UsersTableSeeder');
        $this->seed('ContactsTableSeeder');
        Event::fake();

        $data = [
            'name' => 'John Doe',
            'phone' => '1234567890',
            'email' => 'john.doe@example.com',
            'user_id' => '1',
        ];

        $response = $this->post(url('/pradzia'), $data);

        $response->assertStatus(302);
        $this->assertDatabaseHas('contacts', $data);
    }

    public function testCanFindUser()
    {
        $this->seed('UsersTableSeeder');
        $this->seed('ContactsTableSeeder');
        Event::fake();

        $data = [
            'name' => 'John',
            'lastname' => 'Doe',
            'phone' => '1234567890',
            'email' => 'john.doe@example.com',
        ];

        $response = $this->post(url('/login'), $data);

        $response->assertStatus(302);
        $this->assertDatabaseHas('users', $data);
    }

    public function testCanFindMessage()
    {
        $this->seed('UsersTableSeeder');
        $this->seed('ContactsTableSeeder');
        $this->seed('CommunicationsTableSeeder');
        Event::fake();

        $data = [
            'id' => '1',
            'contact_id' => '1',
            'type' => 'email',
            'subject' => 'Sveiki',
            'message' => 'Nu tai laba diena.',
        ];

        $response = $this->post(url('/communicate'), $data);

        $response->assertStatus(302);
        $this->assertDatabaseHas('communications', $data);
    }
}

