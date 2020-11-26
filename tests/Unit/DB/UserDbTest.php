<?php

namespace Tests\Unit\DB;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Tests\TestCase;

class UserDbTest extends TestCase
{
    use RefreshDatabase;

    /**
     * Test factory by name.
     *
     * @return void
     */
    public function testUserName(): void
    {
        $user = User::factory()->make();
        $name = $user->name;

        $this->assertNotEmpty($name);
    }

    /**
     * Test factory by email.
     *
     * @return void
     */
    public function testUserEmail(): void
    {
        $user = User::factory()->make();
        $email = $user->email;

        $this->assertNotEmpty($email);
    }

    /**
     * Test factory by role.
     *
     * @return void
     */
    public function testUserRole(): void
    {
        $user = User::factory()->make();
        $role = $user->role;

        $this->assertEquals(0, $role, 'Wrong role');
    }

}
