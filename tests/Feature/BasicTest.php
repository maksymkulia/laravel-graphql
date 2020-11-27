<?php


namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class BasicTest extends TestCase
{
    /**
     * Entry point test.
     *
     * @return void
     */
    public function testEntryPoint()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /**
     * Api entry point test.
     *
     * @return void
     */
    public function testApiEntryPoint()
    {
        $response = $this->get('/api/v1');

        $response->assertStatus(200);
    }

    /**
     * GraphiQL entry point test.
     *
     * @return void
     */
    public function testGraghiQlEntryPoint()
    {
        $response = $this->get('/graphiql');

        $response->assertStatus(200);
    }
}
