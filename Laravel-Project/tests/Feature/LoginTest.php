<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use WithoutMiddleware, DatabaseTransactions;

    /**
     * Test user cant login with valid username invalid pass.
     *
     * @return void
     */
    public function Ttc_log_01()
    {
        // Attempt to login with valid credentials
        $response = $this->post('/login', [
            'username' => 'salmasuper',
            'password' => 'invalidpass',
        ]);
        // Assert that the session has the expected user information
        // $this->assertAuthenticated();
        $response->assertSessionHasErrors('login', 'Invalid login credentials');
    }
    /**
     * Test user cant login with invalid username valid pass.
     *
     * @return void
     */
    public function tc_log_02(){
        $response = $this->post('/login', [
            'username'=> 'invalid',
            'password'=> '123456',
        ]);
        // $this->assertAuthenticated();
        $response->assertSessionHasErrors('login', 'Invalid login credentials');
    }
    /**
     * Test user cannot login with invalid credentials.
     *
     * @return void
     */
    public function tc_log_03()
    {
        // Attempt to login with invalid credentials
        $response = $this->post('/login', [
            'username' => 'invaliduser',
            'password' => 'invalidpassword',
        ]);

        // Assert that the user is not redirected
        $response->assertStatus(302);

        // Assert that the session has no user information
        $this->assertGuest();

        // Assert that there is an error message about invalid credentials
        $response->assertSessionHasErrors('login', 'Invalid login credentials');
    }
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function tc_log_04(){
        $response = $this->post('/login', [
            'username' => 'salmasuper',
            'password' => '123456',
        ]);
        $this->assertAuthenticated();
        $response->assertSeeText('kontak pelanggan');
        $response->assertSeeText('layanan');
        $response->assertSeeText('laporan');
        $response->assertSeeText('network');
        $response->assertSeeText('pengaturan');
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function tc_log_05(){
        $response = $this->post('/login', [
            'username' => 'salmaadmin',
            'password' => '123456',
        ]);
        $this->assertAuthenticated();
        $response->assertSeeText('kontak pelanggan');
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function tc_log_06(){
        $response = $this->post('/login', [
            'username' => 'salmateknisi',
            'password' => '123456',
        ]);
        $this->assertAuthenticated();
        $response->assertSeeText('kontak pelanggan');
        $response->assertSeeText('layanan');
        $response->assertSeeText('network');
    }

    public function tc_log_07(){
        $response = $this->post('/login', [
            'username' => 'salmakeuangan',
            'password' => '123456',
        ]);
        $this->assertAuthenticated();
        $response->assertSeeText('kontak pelanggan');
        $response->assertSeeText('laporan');
    }
    /**
     * Test user cannot login with empty username and filled passwordTest user cant login with valid username invalid pass.
     *
     * @return void
     */
    public function test_user_cannot_login_with_empty_username()
    {
        // Attempt to login with empty username and filled password
        $response = $this->post('/login', [
            'username' => '',
            'password' => '123456',
        ]);

        // Assert that the user is not redirected
        $response->assertStatus(302);

        // Assert that the session has no user information
        $this->assertGuest();

        // Assert that there is an error message about invalid login credentials
        $response->assertSessionHasErrors('login', 'Invalid login credentials');
    }

    /**
     * Test user cannot login with filled username and empty password.
     *
     * @return void
     */
    public function test_user_cannot_login_with_empty_password()
    {
        // Attempt to login with filled username and empty password
        $response = $this->post('/login', [
            'username' => 'salma',
            'password' => '',
        ]);

        // Assert that the user is not redirected
        $response->assertStatus(302);

        // Assert that the session has no user information
        $this->assertGuest();

        // Assert that there is an error message about invalid login credentials
        $response->assertSessionHasErrors('login', 'Invalid login credentials');
    }



}
