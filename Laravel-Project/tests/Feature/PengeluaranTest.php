<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Illuminate\Support\Facades\Artisan;
use App\Models\Pengeluaran;
class PengeluaranTest extends TestCase
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
    public function test_pengeluaran_feature_can_be_accessed(){
        $response = $this->get('/laporanpengeluaran');
        $response->assertSeeText('Laporan Pengeluaran');
    }

    /** @test */
    public function test_addpengeluaran_feature_can_be_accessed(){
        $response = $this->get('/tambahpengeluaran');
        $response->assertSeeText('Tambah Pengeluaran');
    }
    /** @test */
    public function tc_lpe_01(){

        // Visit the Bandwidth Baru page
        $response = $this->get('/tambahpengeluaran');

        // Attempt to submit the form without filling all required fields
        $response = $this->post('/tambahpengeluaran', [
            // Missing required fields
        ]);

        // Assert that the user is redirected back to the form with validation errors
        $response->assertStatus(302);
        $response->assertSessionHasErrors(['namakategori', 'namapengeluaran', 'hargapengeluaran']);
    }

    /** @test */
    public function tc_lpe_02()
    {
        // Visit the page where the form is located
        $response=$this->get('/tambahpengeluaran');

        // Submit the form with complete data
        $pengeluaran = [
            'namakategori' => 'Some Category',
            'namapengeluaran' => 'Expense Name',
            'hargapengeluaran' => '123.45',
        ];
        $response = $this->post('/tambahpengeluaran',$pengeluaran);

        // Check if user is redirected to the laporanpengeluaran page
        $response->assertStatus(302);
        $response->assertRedirect('/laporanpengeluaran');

        $response=$this->get('/laporanpengeluaran')
            ->assertSee('Expense Name')
            ->assertSee('Some Category')
            ->assertSee('123.45');
    }
    /** @test */
    public function tc_lpe_03(){
        $pengeluaran = Pengeluaran::create([
            'namakategori' => 'Some Category',
            'namapengeluaran' => 'Expense Name',
            'hargapengeluaran' => '123.45',
        ]);

        $response=$this->get('/laporanpengeluaran');
        $response->assertSee($pengeluaran->namapengeluaran);

        // Click the 'Hapus' button to delete the Bandwidth record
        $deleteResponse = $this->get("/deletelaporanpengeluaran/{$pengeluaran->id}");
        // $deleteResponse->assertStatus(302);
        // $deleteResponse->assertRedirect('/laporanpengeluaran');

        // $updatedResponse = $this->get('/laporanpengeluaran');
        $deleteResponse->assertDontSee($pengeluaran);

        // $this->assertDatabaseMissing('pengeluarans', ['id' => $pengeluaran->id]);
    }

    /** @test */
    public function test_total_pendapatan_is_sum_of_all_harga()
    {

        // Assuming there are plans created or updated today and yesterday
        $pengeluaran1 = Pengeluaran::create([
            'namakategori' => 'Some Category1',
            'namapengeluaran' => 'Expense Name',
            'hargapengeluaran' => '123.45',
        ]);
        $pengeluaran2 = Pengeluaran::create([
            'namakategori' => 'Some Category2',
            'namapengeluaran' => 'Expense Name',
            'hargapengeluaran' => '123.45',
        ]);
        // Assuming there are plans with different harga

        $expectedTotal = $pengeluaran1->hargapengeluaran + $pengeluaran2->hargapengeluaran;
        // dd($expectedTotal);

        $this->get('/laporanpengeluaran')
            ->assertSee('246.9');
    }
}
