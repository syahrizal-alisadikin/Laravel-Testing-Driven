<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_login()
    {
        $this->withoutExceptionHandling();

        $user = User::factory(User::class)->create();
        // Manipulasi data untuk login
        $this->actingAs($user);
        $response = $this->get('/');

        $response->assertStatus(200);
    }
}
