<?php

namespace Tests\Unit;

use App\Models\Kategori;
use Tests\TestCase;

class FirstTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/dashboard');

        $response->assertStatus(200);
    }
}
