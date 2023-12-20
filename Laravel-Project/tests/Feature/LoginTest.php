<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase, WithFaker;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_can_login_with_valid_credentials()
    {
        // Create a user with known credentials
        // $user = User::factory()->create([
        //     'username' => 'testuser',
        //     'password' => Hash::make('password'),
        // ]);

        // Attempt to login with valid credentials
        $response = $this->post('/login', [
            'username' => 'salma',
            'password' => '123456',
        ]);

        // Assert that the user is redirected to the intended page (in this case, '/')
        $response->assertRedirect('/');

        // Assert that the session has the expected user information
        // $this->assertAuthenticated();

        // // Cleanup
        // $user->delete();
    }

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_user_cannot_login_with_invalid_credentials()
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

    /**
     * Test user cannot login with invalid credentials.
     *
     * @return void
     */
}
