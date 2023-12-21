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
    public function user_can_access_listkontak_feature_and_see_text_list_kontak()
    {
        $response = $this->get('/listKontak');

        $response->assertSeeText('List Kontak');
    }

    /** @test */
    // public function user_can_edit_data_using_edit_button()
    // {
    //     // Assuming you have a customer with the username "udin"
    //     $customer = Customers::factory()->create([
    //         'username' => 'udin',
    //     ]);

    //     $response = $this->get('/listKontak');

    //     $response->assertSeeText('udin')
    //         ->assertDontSeeText('udinedit');

    //     // Perform the edit action
    //     $this->get('/editKontak/' . $customer->id);

    //     // Assuming you have updated the username to "udinedit"
    //     $customer->update(['username' => 'udinedit']);

    //     // Check if the changes are reflected
    //     $response = $this->get('/listKontak');

    //     $response->assertDontSeeText('udin')
    //         ->assertSeeText('udinedit');
    // }
}
