<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RegistrationUserTest extends TestCase
{

    use RefreshDatabase;
    // Mengawali dengan test

    /** @test */

    public function registration_page()
    {
        // $this->withoutExceptionHandling();
        $response = $this->get('/register');
        $response->assertStatus(200);
    }

    /** @test */
    public function registration_store()
    {
        $this->withoutExceptionHandling();
        $user = User::factory()->make();

        // Kirim data ke halaman register
        $response = $this->post('/register', $user->toArray());

        // User Authenticated setelah berhasil register
        $this->assertAuthenticated();

        // Redirect Ke halaman dashboard
        $response->assertRedirect('/dashboard');
    }
}
