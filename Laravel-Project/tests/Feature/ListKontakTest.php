<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use App\Models\Customers;

class ListKontakTest extends TestCase
{
    use WithoutMiddleware, DatabaseTransactions;
    /**
     * A basic feature test example.
     * @return void
     */

    /** @test */
    public function tc_lk_01()
    {
        $response = $this->get('/listKontak');

        $response->assertSeeText('List Kontak');
    }

    public function tc_lk_02_and_tc_lk_03()
    {

        // Find the customer with the given username
        $customer = Customers::where('username', 'test')->first();

        // Visit the edit page for the customer
        $this->get("/edittambahkontak/{$customer->id}");

        $editedUsername = 'udinedit';
        $this->put("/updateKontak/{$customer->id}", [
          'username' => $editedUsername,
          // Add other fields that you want to update
         ]);

        $this->get('/listKontak')
         ->assertSee($editedUsername) // Ensure the edited username is present in the list
         ->assertDontSee($customer); // Ensure the original username is not present in the list

         //test case 3
        $this->get("/hapusKontak/{$customer->id}");
         // Assert: Check that the customer with 'udinedit' is deleted from the database
        $this->assertDatabaseMissing('customers', ['id' => $customer->id, 'username' => $editedUsername]);

        // Assert: Check that the deleted username 'udinedit' is not present in the '/listKontak' page
        // $this->get('/listKontak')
        //     ->assertDontSee('udinedit');
        $this->get('/listKontak')
         ->assertDontSee($customer);
        //  ->assertDontSee($editedUsername);
    }
}
