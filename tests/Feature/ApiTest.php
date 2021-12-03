<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ApiTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_successful()
    {
        $response = $this->get('/api/products/recommended/vilnius');

        $response->assertStatus(200);
    }

    public function test_wrong_city()
    {
        $response = $this->get('/api/products/recommended/vilniusfdsdf');

        $response->assertStatus(404);
    }

    public function test_unpassed_validation()
    {
        $response = $this->get('/api/products/recommended/vilniusfdsdfvilniusfdsdfvilniusfdsdfvilniusfdsdfvilniusfdsdfvilniusfdsdfvilniusfdsdfvilniusfdsdf');

        $response->assertStatus(422);
    }

    public function test_empty_city()
    {
        $response = $this->get('/api/products/recommended/');

        $response->assertStatus(404);
    }

}
