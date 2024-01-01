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
    public function TC_TKB_02()
    {
        $kontakData = [
            'username' => 'john_doe',
            'fullnameCustomer' => 'John Doe',
            'email' => 'john',
            'phonenumber' => 'not_a_number',
            'password' => 'password123',
            'password_confirmation' => 'password123',
            'address' => '123 Main St, City',
        ];

        $response = $this->post('/tambahkontakbaru', $kontakData);
        $response->assertSessionMissing('success')
            ->assertSessionHasErrors(['email'])
            ->assertSessionHasErrors(['phonenumber']);
        // $this->assertDatabaseMissing('customers', $kontakData);
    }

    /** @test */
    public function TC_TKB_05()
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
        // $response->assertSeeText('List Kontak');
    }

    /** @test */
    public function TC_TKB_01()
    {
        $response = $this->post('/tambahkontakbaru', []);

        $response->assertSessionMissing('success')
            ->assertSessionHasErrors(['username', 'fullnameCustomer', 'email', 'phonenumber', 'password', 'address']);
    }

    /** @test */
    public function TC_TKB_04()
    {
    $kontakData = [
        'username' => 'john_doe',
        'email' => 'gmail.com', // Incorrect email format for Gmail
    ];

    $response = $this->post('/tambahkontakbaru', $kontakData);

    $response->assertSessionMissing('success')
        ->assertSessionHasErrors(['email']);

    $this->assertDatabaseMissing('customers', $kontakData);
    }

    /** @test */
    public function TC_TKB_03()
    {
    $kontakData = [
        'username' => 'john_doe',
        'phonenumber' => 'not_a_number', // Incorrect phone number format
    ];

    $response = $this->post('/tambahkontakbaru', $kontakData);

    $response->assertSessionMissing('success')
        ->assertSessionHasErrors(['phonenumber']);

    $this->assertDatabaseMissing('customers', $kontakData);
    }

}
