<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
// use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Artisan;

use Tests\TestCase;
use App\Models\Plan;
use App\Models\Routers;
use App\Models\Bandwidth;
use App\Models\Pool;
use Carbon\Carbon;

class LaporanKeuanganTest extends TestCase
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
    public function test_laporan_keuangan_feature_can_be_accessed(){
        $response = $this->get('/laporankeuangan');
        $response->assertStatus(200);
        $response->assertSeeText('Laporan Keuangan');
    }

}
