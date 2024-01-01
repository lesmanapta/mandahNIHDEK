<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Artisan;
use App\Models\Bandwidth;

class BandwidthTest extends TestCase
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
    public function test_bandwidth_feature_can_be_accessed(){
        $response = $this->get('/daftarbandwidth');
        $response->assertSeeText('Daftar Bandwidth');
    }

    /** @test */
    public function test_addbandwidth_feature_can_be_accessed(){
        $response = $this->get('/bandwidthbaru');
        $response->assertSeeText('Tambah Bandwidth Baru');
    }

    /** @test */
    public function test_input_missing_data(){

        // Visit the Bandwidth Baru page
        $response = $this->get('/bandwidthbaru');

        // Attempt to submit the form without filling all required fields
        $response = $this->post('/bandwidthbaru', [
            // Missing required fields
        ]);

        // Assert that the user is redirected back to the form with validation errors
        $response->assertStatus(302);
        $response->assertSessionHasErrors(['name_bw', 'rate_down', 'rate_down_unit', 'rate_up', 'rate_up_unit']);

    }

    /** @test */
    public function user_successfully_adds_bandwidth_with_complete_data()
    {
        // Visit the Bandwidth Baru page
        $response = $this->get('/bandwidthbaru');
        // $response->assertStatus(200);

        // Generate complete data for bandwidth
        $bandwidthData = [
            'name_bw' => 'Test Bandwidth',
            'rate_down' => 500,
            'rate_down_unit' => 'Kbps',
            'rate_up' => 200,
            'rate_up_unit' => 'Mbps',
        ];

        // Attempt to submit the form with complete data
        $response = $this->post('/bandwidthbaru', $bandwidthData);

        // Assert that the user is redirected to the Bandwidth Daftar page
        $response->assertStatus(302);
        $response->assertRedirect('/daftarbandwidth');

        // Assert that there is a new bandwidth record in the database
        // $this->assertCount(1, Bandwidth::all());

        // Assert that the Bandwidth Daftar page displays the newly added bandwidth
        $response = $this->get('/daftarbandwidth');
        $response->assertSee($bandwidthData['name_bw']);
        $response->assertSee($bandwidthData['rate_down']);
        $response->assertSee($bandwidthData['rate_down_unit']);
        $response->assertSee($bandwidthData['rate_up']);
        $response->assertSee($bandwidthData['rate_up_unit']);

        $response->assertSessionDoesntHaveErrors();

    }

    /** @test */
    public function user_can_edit_bandwidth_data()
    {
        // Create a Bandwidth record with name_bw equal to 'BAND02'
        $bandwidth = Bandwidth::create([
            'name_bw' => 'BAND02',
            'rate_down' => 100,
            'rate_down_unit' => 'Mbps',
            'rate_up' => 50,
            'rate_up_unit' => 'Kbps',
        ]);

        // Visit the Bandwidth Edit page
        $response = $this->get("/editbandwidth/{$bandwidth->id}");
        // $response->assertStatus(200);

        // Update data for bandwidth
        $updatedData = [
            'name_bw' => 'Updated Bandwidth',
            'rate_down' => 200,
            'rate_down_unit' => 'Mbps',
            'rate_up' => 100,
            'rate_up_unit' => 'Kbps',
        ];

        // Attempt to submit the form with updated data
        $response = $this->put("/updatebandwidth/{$bandwidth->id}", $updatedData);

        // Assert that the user is redirected to the Bandwidth Daftar page
        $response->assertStatus(302);
        $response->assertRedirect('/daftarbandwidth');

        // Refresh the bandwidth record from the database
        $bandwidth = $bandwidth->fresh();

        // Assert that the bandwidth record has been updated with new data
        $this->assertEquals($updatedData['name_bw'], $bandwidth->name_bw);
        $this->assertEquals($updatedData['rate_down'], $bandwidth->rate_down);
        $this->assertEquals($updatedData['rate_down_unit'], $bandwidth->rate_down_unit);
        $this->assertEquals($updatedData['rate_up'], $bandwidth->rate_up);
        $this->assertEquals($updatedData['rate_up_unit'], $bandwidth->rate_up_unit);

        $this->get('/daftarbandwidth')
            ->assertDontSee($bandwidth);
    }

    /** @test */
    public function user_can_delete_bandwidth_data()
    {
        // Create a Bandwidth record for testing
        $bandwidth = Bandwidth::create([
            'name_bw' => 'Test Bandwidth',
            'rate_down' => 100,
            'rate_down_unit' => 'Mbps',
            'rate_up' => 50,
            'rate_up_unit' => 'Kbps',
        ]);

        // Visit the Bandwidth List page
        $response = $this->get('/daftarbandwidth');
        // $response->assertStatus(200);

        // Assert that the Bandwidth record is initially present on the page
        $response->assertSee($bandwidth->name_bw);

        // Click the 'Hapus' button to delete the Bandwidth record
        $deleteResponse = $this->get("/deletebandwidth/{$bandwidth->id}");
        $deleteResponse->assertStatus(302);

        // Assert that the user is redirected back to the Bandwidth List page
        $deleteResponse->assertRedirect('/daftarbandwidth');

        // Refresh the Bandwidth List page
        $updatedResponse = $this->get('/daftarbandwidth');
        $updatedResponse->assertDontSee($bandwidth);

        // Assert that the Bandwidth record is deleted from the database
        $this->assertDatabaseMissing('bandwidth', ['id' => $bandwidth->id]);
    }
}
