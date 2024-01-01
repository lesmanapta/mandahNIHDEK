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
    public function TC_NR_01()
    {
        $response = $this->post('/store', [
            // Provide incomplete data here
        ]);

        $response->assertStatus(302); // Redirect status
        $response->assertSessionHasErrors(); // Ensure there are validation errors

        // Assert that no data is in the database
        $this->assertDatabaseMissing('routers', ['name' => 'Router 1']);
        // Now, make a request to the /router route to check that 'Router 1' is not present in the table
    }

    /** @test */
    public function TC_NR_02()
    {
        $response = $this->post('/store', [
            'name' => 'Router 1',
            'ip_address' => '192.168.1.1',
            'username' => 'admin',
            'password' => 'password123',
            'status' => 'Enable',
        ]);

        $response->assertRedirect('/router'); // Redirect to the routers index page

        // Assert that the data is in the database
        $this->assertDatabaseHas('routers', ['name' => 'Router 1']);

        // Now, make a request to the /router route to check that 'Router 1' is present in the table
        $response = $this->get('/router');
        $response->assertSee('Router 1');
        $response->assertSessionDoesntHaveErrors();
    }

    /** @test */
    public function TC_NR_03()
    {
        $response = $this->post('/store', [
            'name' => 'Router 1full',
            'ip_address' => '192.168.1.1',
            'username' => 'admin',
            'password' => 'password123',
            'status' => 'Enable',
            'deskripsi' => 'full'
        ]);

        $response->assertRedirect('/router'); // Redirect to the routers index page

        // Assert that the data is in the database
        $this->assertDatabaseHas('routers', ['name' => 'Router 1full']);

        // Now, make a request to the /router route to check that 'Router 1full' is present in the table
        $response = $this->get('/router');
        $response->assertSee('Router 1full');
    }
    public function TC_NR_04_and_TC_NR_05()
    {
        // Find the router with the given name
        $router = Routers::where('name', 'RTR-01')->first();

        // Visit the edit page
        $this->get("/editrouter/{$router->id}");

        $editedName = 'RTR-edit';
        $this->put("/updaterouter/{$router->id}", [
            'name' => $editedName,
            // Provide other updated data as needed
        ]);

        // Check that the router data in the database is updated
        // $this->assertDatabaseHas('routers', ['id' => $router->id, 'name' => 'Updated Router']);

        $this->get('/router')
            ->assertSee($editedName)
            ->assertDontSee($router);

        //TC_NR_05
        $this->get("/deleterouter/{$router->id}");
        $this->assertDatabaseMissing('routers', ['id' => $router->id]);
        $this->get('/router')
            ->assertDontSee($router);
    }
}
