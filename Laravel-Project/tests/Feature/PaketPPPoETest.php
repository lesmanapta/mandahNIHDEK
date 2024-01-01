<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Plan;
use App\Models\Bandwidth;
use App\Models\Pool;
use App\Models\Routers;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Artisan;


class PaketPPPoETest extends TestCase
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
    public function test_pppoe_feature_can_be_accessed(){
        $response = $this->get('/paketpppoe');
        $response->assertSeeText('Paket PPPoE');
    }

    /** @test */
    public function test_addpppoe_feature_can_be_accessed(){
        $response = $this->get('/tambahpaketbaru');
        $response->assertSeeText('Edit Paket');
    }

    /** @test */
    public function tc_lp_01()
    {
        $response = $this->post('/tambahpaketbaru', [
            'namapaket' => 'Test Paket',
        ]);

        $response->assertSessionHasErrors();

        $this->assertDatabaseMissing('plans', ['namapaket' => 'Test Paket']);
    }

    /** @test */
    public function tc_lp_02()
    {
        $router = Routers::where('name','RTR-01')->first();
        $pool = Pool::where('pool_name','POOL-1')->first();
        $bandwidth = Bandwidth::where('name_bw','BAND01')->first();

        $response = $this->post('/tambahpaketbaru', [
            'status' => 'Enable',
            'namapaket' => 'Test Paket',
            'namabandwith' => $bandwidth->id,
            'harga' => 100000,
            'masa_aktif' => 3034,
            'masa_aktif_unit' => 'menit',
            'nama_router' => $router->id,
            'ippol' => $pool->id,
        ]);

        // $response->assertRedirect('/paketpppoe');
        // $this->assertDatabaseHas('plans', ['namapaket' => 'Test Paket']);

        $this->get('/paketpppoe')
            ->assertSee('Test Paket');

        // $response->assertSessionDoesntHaveErrors();
    }

    /** @test */
    public function tc_lp_03_and_tc_lp_04()
    {
        $router = Routers::where('name','RTR-01')->first();
        $pool = Pool::where('pool_name','POOL-1')->first();
        $bandwidth = Bandwidth::where('name_bw','BAND01')->first();
        $pppoe = Plan::where('namapaket','PPPoE-01')->first();

        // $response = $this->get('/editippool/' . $pool->id);
        // $response->assertSuccessful();
        $this->get("/editPaketPPPoE/{$pppoe->id}");

        $editedName = 'PPPoE-edit';
        $this->put("/updatePaketPPPoE/{$pppoe->id}", [
            'namapaket' => $editedName,
            'nama_router' => $router->id,
            'ippool' =>$pool->id,
            'namabandwith' => $bandwidth->id,
        ]);

        $this->get('/paketpppoe')
            ->assertSee($editedName)
            ->assertDontSee($pppoe);

        //TC_LP_04
        $this->get("/deletePaketPPPoE/{$pppoe->id}");
        $this->assertDatabaseMissing('plans', ['id' => $pppoe->id]);
        $this->get('/paketpppoe')
            ->assertDontSee($pppoe);
    }
}
