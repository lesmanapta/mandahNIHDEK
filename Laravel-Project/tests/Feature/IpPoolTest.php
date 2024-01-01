<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Pool;
use App\Models\Routers;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Artisan;

class IpPoolTest extends TestCase
{
    use WithoutMiddleware, DatabaseTransactions;

    /**
     * A basic feature test example.
     * @return void
     */

     public function setUp(): void
     {
         parent::setUp();
         Artisan::call('migrate');
     }

    /** @test */
    public function test_pool_feature_can_be_accessed(){
        $response = $this->get('/ippool');
        $response->assertSeeText('IP Pool');
    }

    /** @test */
    public function test_addpool_feature_can_be_accessed(){
        $response = $this->get('/tambahippool');
        $response->assertSeeText('Tambah Pool Baru');
    }

    /** @test */
    public function tc_np_01()
    {
        $response = $this->post('/tambahippool', [
            'pool_name' => 'Test Pool',
        ]);

        $response->assertSessionHasErrors();

        $this->assertDatabaseMissing('pool', ['pool_name' => 'Test Pool']);

        // $this->get('/ippool')
        //     ->assertDontSee('Test Pool');
    }

    /** @test */
    public function tc_np_02()
    {
        $router = Routers::where('name','RTR-01')->first();

        $response = $this->post('/tambahippool', [
            'pool_name' => 'Test Pool',
            'range_ip' => '192.168.1.1-192.168.1.10',
            'routers' => $router->id,
        ]);

        $response->assertRedirect('/ippool');
        $this->assertDatabaseHas('pool', ['pool_name' => 'Test pool']);

        $this->get('/ippool')
            ->assertSee('Test Pool');

        $response->assertSessionDoesntHaveErrors();
    }

    /** @test */
    public function tc_np_03_and_tc_np_04()
    {
        $router = Routers::where('name','RTR-01')->first();
        $pool = Pool::where('pool_name','POOL-1')->first();

        // $response = $this->get('/editippool/' . $pool->id);
        // $response->assertSuccessful();
        $this->get("/editippool/{$pool->id}");

        $editedName = 'POOL-edit';
        $this->put("/updateippool/{$pool->id}", [
            'pool_name' => $editedName,
            'routers' => $router->id,
        ]);

        $this->get('/ippool')
            ->assertSee($editedName)
            ->assertDontSee($pool);

        //TC_NR_04
        $this->get("/deleteippool/{$pool->id}");
        $this->assertDatabaseMissing('pool', ['id' => $pool->id]);
        $this->get('/ippool')
            ->assertDontSee($pool);
    }
}
