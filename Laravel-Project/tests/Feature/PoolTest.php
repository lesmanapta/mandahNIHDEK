<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\pool;

class PoolTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    use RefreshDatabase;

    public function test_pool_return_successfully(): void
    {
        $response = $this->get('/ippool');

        $response->assertStatus(200);
    }

    // public function testCreatePool()
    // {
    // $response = $this->post('/tambahippool', [
    //     'pool_name' => 'Test Pool',
    //     'range_ip' => '192.168.1.1-192.168.1.10',
    //     'routers' => ['1'], // Assuming 4 is a valid router ID
    // ]);

    // $response->assertRedirect('/tambahippool');
    // $this->assertDatabaseHas('pool', ['pool_name' => 'Test Pool']);
    // }

    // public function testEditPool()
    // {
    // $pool = Pool::factory()->create();

    // $response = $this->get("/editippool/{$pool->id}");
    // $response->assertStatus(200);

    // $response = $this->put("/updateippool/{$pool->id}", [
    //     'pool_name' => 'Updated Pool Name',
    //     'range_ip' => '192.168.1.11-192.168.1.20',
    //     'routers' => ['2'], // Assuming 4 is a valid router ID
    // ]);

    // $response->assertRedirect('/ippool');
    // $this->assertDatabaseHas('pool', ['pool_name' => 'Updated Pool Name']);
    // }

    // public function testDeletePool()
    // {
    //     $pool = Pool::factory()->create();

    //     $response = $this->get("/deleteippool/{$pool->id}");
    //     $response->assertRedirect('/ippool');
    //     $this->assertDatabaseMissing('pool', ['id' => $pool->id]);
    // }
}
