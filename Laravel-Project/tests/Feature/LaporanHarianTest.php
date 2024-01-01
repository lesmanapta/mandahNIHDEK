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

class LaporanHarianTest extends TestCase
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
    public function test_can_access_laporan_harian_feature()
    {
        $response = $this->get('/laporanharian');
        $response->assertSee('Total Pendapatan:');
        // $response->assertSee('Laporan Harian');
    }

    public function test_only_show_today_created_or_updated_plans()
    {
        $router = Routers::where('name','RTR-01')->first();
        $pool = Pool::where('pool_name','POOL-1')->first();
        $bandwidth = Bandwidth::where('name_bw','BAND01')->first();
        // Assuming there are plans created or updated today and yesterday
        $todayPlans = Plan::create([
            'status' => 'Enable',
            'namapaket' => 'Test Paket',
            'namabandwith' => $bandwidth->id,
            'harga' => 100000,
            'masa_aktif' => 3034,
            'masa_aktif_unit' => 'menit',
            'nama_router' => $router->id,
            'ippol' => $pool->id,
        ]);
        // $yesterdayPlans = Plan::where(['created_at' => now()->subDay()])->firts;

        $anotherday = Plan::where('namapaket','PPPoE-01')->first();
        $response = $this->get('/laporanharian');
        $response->assertSee($todayPlans->namapaket);
        $response->assertDontSee($anotherday->namapaket);
    }

    public function test_total_pendapatan_is_sum_of_all_harga()
    {
        $router = Routers::where('name','RTR-01')->first();
        $pool = Pool::where('pool_name','POOL-1')->first();
        $bandwidth = Bandwidth::where('name_bw','BAND01')->first();
        // Assuming there are plans created or updated today and yesterday
        $todayPlans1 = Plan::create([
            'status' => 'Enable',
            'namapaket' => 'Test Paket1',
            'namabandwith' => $bandwidth->id,
            'harga' => 100000,
            'masa_aktif' => 3034,
            'masa_aktif_unit' => 'menit',
            'nama_router' => $router->id,
            'ippol' => $pool->id,
        ]);

        $todayPlans2 = Plan::create([
            'status' => 'Enable',
            'namapaket' => 'Test Paket2',
            'namabandwith' => $bandwidth->id,
            'harga' => 250000,
            'masa_aktif' => 300,
            'masa_aktif_unit' => 'menit',
            'nama_router' => $router->id,
            'ippol' => $pool->id,
        ]);
        // Assuming there are plans with different harga
        $anotherday = Plan::where('namapaket','PPPoE-01')->first();


        $unexpected = $todayPlans1->harga + $todayPlans2->harga + $anotherday->harga;
        $expectedTotal = $todayPlans1->harga + $todayPlans2->harga;
        // dd($expectedTotal);
        // dd($unexpected);

        $this->get('/laporanharian')
            ->assertSee('350000')
            ->assertDontSee('352112');
    }

    //GAK TAU AH ANJAY CEK EXPORT EXCELNYA BEGIMANA CODINGNYA
    // public function test_export_to_excel_success()
    // {
    //     $anotherday1 = Plan::where('namapaket','PPPoE-01')->first();
    //     $anotherday2 = Plan::where('namapaket','PPPoE-02')->first();
    //     $anotherday3 = Plan::where('namapaket','edot')->first();

    //     // Access the /laporanharian route to view the table
    //     $response = $this->get('/laporanharian');

    //     // Trigger the export action
    //     $exportResponse = $this->get('/laporanharian/export-excel');

    //     // Assert that the export response is successful
    //     // $exportResponse->assertSuccessful();

    //     // Assert that the exported Excel file contains the expected data
    //     $this->assertFileExists(storage_path('C:\Users\Salma\Downloads\laporan_keuangan.xlsx'));
    //     // dd($exportedData);
    //     // $this->assertStringContainsString($anotherday1->namapaket, $exportedData);
    //     // $this->assertStringContainsString($anotherday2->namapaket, $exportedData);
    //     // $this->assertStringContainsString($anotherday3->namapaket, $exportedData);
    // }
}
