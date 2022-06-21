<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use App\Models\User;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;

    /**  @test */
    public function login_page()
    {
        $response = $this->get('/login');
        $response->assertStatus(200);
    }

    /**  @test */
    public function test_login_store()
    {
        $user = User::factory()->create();

        $response = $this->post('/login', [
            'email' => $user->email,
            'password' => 'salah euy',
        ]);


        $this->assertAuthenticated();

        $response->assertRedirect('/dashboard');
    }
}
