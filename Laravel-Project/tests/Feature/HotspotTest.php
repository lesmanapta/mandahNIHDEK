<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Artisan;
// use App\Models\Hotspot;

class HotspotTest extends TestCase
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
    public function test_hotspot_feature_can_be_accessed(){
        $response = $this->get('/pakethotspot');
        $response->assertStatus(200);
        $response->assertSeeText('Paket Hotspot');
    }

}
