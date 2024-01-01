<?php

namespace Tests\Feature;

use App\Models\Routers;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Artisan;
use Tests\TestCase;

class RouterTest extends TestCase
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
    public function test_router_feature_can_be_accessed()
    {
        $response = $this->get('/router');

        $response->assertSeeText('Router');
    }
    /** @test */
    public function test_routeradd_feature_can_be_accessed()
    {
        $response = $this->get('/tambahrouter');

        $response->assertSeeText('Tambah Router Baru');
    }
    /** @test */
    public function tc_nr_01()
    {
        $response = $this->post('/store', [
            // Provide incomplete data here
        ]);

        $response->assertStatus(302); // Redirect status
        $response->assertSessionHasErrors(); // Ensure there are validation errors
        $response->assertSessionHasErrors(['name','ip_address', 'username','password','status']);

        // Assert that no data is in the database
    }

    /** @test */
    public function tc_nr_02()
    {
        $response = $this->post('/store', [
            'name' => 'Router 1',
            'ip_address' => '192.168.1.1',
            'username' => 'admin',
            'password' => 'password123',
            'status' => 'Enable',
        ]);

        $response->assertStatus(302);
        $response->assertRedirect('/router'); // Redirect to the routers index page
        $this->assertDatabaseHas('routers', ['name' => 'Router 1',
        'ip_address' => '192.168.1.1', 'username' => 'admin',
        'status' => 'Enable'
        ]);

        // Now, make a request to the /router route to check that 'Router 1' is present in the table
        $response = $this->get('/router');
        $response->assertSee('Router 1');
        $response->assertSee('192.168.1.1');
        $response->assertSee('admin');
        $response->assertSee('password123');
        $response->assertSee('Enable');
        $response->assertSessionDoesntHaveErrors();
    }

    /** @test */
    public function tc_nr_03()
    {
        $response = $this->post('/store', [
            'name' => 'Router 1full',
            'ip_address' => '192.168.1.1',
            'username' => 'admin',
            'password' => 'password123',
            'status' => 'Enable',
            'deskripsi' => 'fulls'
        ]);

        $response->assertRedirect('/router'); // Redirect to the routers index page

        // Assert that the data is in the database
        $this->assertDatabaseHas('routers', ['name' => 'Router 1full','deskripsi' => 'fulls']);

        // Now, make a request to the /router route to check that 'Router 1full' is present in the table
        $response = $this->get('/router');
        $response->assertSee('Router 1full');
        $response->assertSee('fulls');
    }
    public function tc_nr_04_and_tc_nr_05()
    {
        // Find the router with the given name
        $router = Routers::where('name', 'RTR-01')->first();

        // Visit the edit page
        $this->get("/editrouter/{$router->id}");

        $editedName = 'RTR-edit';
        $this->put("/updaterouter/{$router->id}", [
            'name' => $editedName,
        ]);
        
        $this->get('/router')
            ->assertSee($editedName)
            ->assertDontSee($router);

        //TC_NR_05
        $deleteResponse = $this->get("/deleterouter/{$router->id}");
        $this->assertDatabaseMissing('routers', ['id' => $router->id]);
        $this->get('/router')
            ->assertDontSee($router);
        $deleteResponse->assertRedirect('/router');
    }
}
