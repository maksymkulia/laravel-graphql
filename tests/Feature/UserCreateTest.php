<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use Str;


class UserCreateTest extends TestCase
{
    /**
     * Api Route
     *
     * @const
     */
    const API = '/api/v1/?query=mutation+createUser';

    /**
     * Entry point test.
     *
     * @return void
     */
    public function testEntryPoint()
    {
        $response = $this->get(self::API);

        $response->assertStatus(200);
    }

    /**
     * Create User.
     *
     * @return void
     */
    public function testCreateUser()
    {
        $name = Str::random(5);
        $email = Str::random(12) . '@' . Str::random(5) . '.' . Str::random(2);
        $role = 1;

        $query = sprintf('{createUser(name:"%s",email:"%s",role: %s){name, email}}', $name, $email, $role);
        $query = self::API . $query;

        $response = $this->get($query);

        $response->assertStatus(200);
        $response->assertJson([
            'data' => [
                'createUser' => [
                    'name' => $name,
                    'email' => $email,
                ]
            ]
        ]);
    }
}
