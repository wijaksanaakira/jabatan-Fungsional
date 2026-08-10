<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\LevelUser;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class AuthTest extends TestCase
{
    // Use trait to cleanly reset DB state between tests if needed,
    // but the task specifically requires NOT clearing existing data.
    // So we'll manage test data explicitly.

    public function test_login_page_can_be_rendered(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Sistem Informasi');
    }

    public function test_users_can_authenticate_using_the_login_screen(): void
    {
        $user = User::factory()->create([
            'password' => Hash::make('password'),
            'username' => 'testuser',
            'is_active' => true,
        ]);

        $response = $this->post('/login', [
            'username' => 'testuser',
            'password' => 'password',
        ]);

        $this->assertAuthenticated();
        $response->assertRedirect('/dashboard');

        $user->forceDelete();
    }

    public function test_users_can_not_authenticate_with_invalid_password(): void
    {
        $user = User::factory()->create([
            'password' => Hash::make('password'),
            'username' => 'testuser2',
            'is_active' => true,
        ]);

        $this->post('/login', [
            'username' => 'testuser2',
            'password' => 'wrong-password',
        ]);

        $this->assertGuest();

        $user->forceDelete();
    }

    public function test_inactive_users_can_not_authenticate(): void
    {
        $user = User::factory()->create([
            'password' => Hash::make('password'),
            'username' => 'inactiveuser',
            'is_active' => false,
        ]);

        $response = $this->post('/login', [
            'username' => 'inactiveuser',
            'password' => 'password',
        ]);

        $this->assertGuest();
        $response->assertSessionHasErrors('error');

        $user->forceDelete();
    }
}