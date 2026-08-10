<?php

namespace Tests\Feature;

use App\Models\User;
use App\Models\UserAuthToken;
use App\Services\QrAuthenticationService;
use Tests\TestCase;

class QrAuthTest extends TestCase
{
    public function test_qr_generation_and_authentication()
    {
        $user = User::factory()->create([
            'username' => 'qrtestuser',
            'is_active' => true,
        ]);

        $service = app(QrAuthenticationService::class);
        $rawToken = $service->generateToken($user);

        $this->assertNotNull($rawToken);

        $tokenRecord = UserAuthToken::where('user_id', $user->id)->first();
        $this->assertNotNull($tokenRecord);
        $this->assertEquals('active', $tokenRecord->status);

        $authenticatedUser = $service->authenticateWithToken($rawToken);

        $this->assertNotNull($authenticatedUser);
        $this->assertEquals($user->id, $authenticatedUser->id);

        // Clean up
        $tokenRecord->delete();
        $user->forceDelete();
    }
}