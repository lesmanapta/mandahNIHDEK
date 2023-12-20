<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Routers;

class RouterTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_router_return_successfully(): void
    {
        $response = $this->get('/router');
        // $response->assertSee('');

        // $response->assertStatus(200);
    }
}
