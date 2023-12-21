<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class TambahKontakTest extends TestCase
{
    use WithoutMiddleware, DatabaseTransactions;
    /**
     * A basic feature test example.
     * @return void
     */

    /** @test */
    public function user_can_access_tambahkontakbaru_page()
    {
        $response = $this->get('/tambahkontakbaru');

        // $response->assertStatus(200)
        $response->assertSeeText('Tambah Kontak Baru');
    }

    /** @test */
    public function user_can_create_kontak_and_store_in_database()
    {
        $kontakData = [
            'username' => 'john_doe',
            'fullnameCustomer' => 'John Doe',
            'email' => 'john@example.com',
            'phonenumber' => '123456789',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'address' => '123 Main St, City',
        ];

        $response = $this->post('/tambahkontakbaru', $kontakData);

        $response->assertRedirect('/listKontak')
            ->assertSessionHas('success', 'Kontak baru berhasil ditambahkan');

        $this->assertDatabaseHas('customers', [
            'username' => 'john_doe',
            'fullnameCustomer' => 'John Doe',
            'email' => 'john@example.com',
            'phonenumber' => '123456789',
            'address' => '123 Main St, City',
        ]);
    }

    /** @test */
    public function creating_kontak_requires_all_fields()
    {
        $response = $this->post('/tambahkontakbaru', []);

        $response->assertSessionMissing('success')
            ->assertSessionHasErrors(['username', 'fullnameCustomer', 'email', 'phonenumber', 'password', 'address']);
    }

    /** @test */
}
