<?php

namespace App\Services;

use App\Models\User;
use App\Models\UserAuthToken;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class QrAuthenticationService
{
    /**
     * Generate a new QR token for a user.
     *
     * @param User $user
     * @param int|null $expiresInDays
     * @return string The raw token
     */
    public function generateToken(User $user, $expiresInDays = 30)
    {
        // First invalidate existing active tokens
        $this->revokeAllTokens($user, Auth::id());

        $rawToken = bin2hex(random_bytes(32));
        $tokenHash = hash('sha256', $rawToken);

        $expiresAt = $expiresInDays ? now()->addDays($expiresInDays) : null;

        UserAuthToken::create([
            'user_id' => $user->id,
            'token_hash' => $tokenHash,
            'type' => 'qr_login',
            'status' => 'active',
            'expires_at' => $expiresAt,
            'created_by' => Auth::id(),
        ]);

        return $rawToken;
    }

    /**
     * Authenticate user with token.
     *
     * @param string $rawToken
     * @return User|null
     */
    public function authenticateWithToken($rawToken)
    {
        $tokenHash = hash('sha256', $rawToken);

        $token = UserAuthToken::where('token_hash', $tokenHash)
                             ->where('status', 'active')
                             ->where('type', 'qr_login')
                             ->first();

        if (!$token || !$token->isValid()) {
            return false;
        }

        $user = $token->user;

        if (!$user || !$user->isActive()) {
            return false;
        }

        // Update last used
        $token->last_used_at = now();
        $token->save();

        // Login user
        Auth::login($user);

        return $user;
    }

    /**
     * Revoke a specific token.
     */
    public function revokeToken(UserAuthToken $token, $revokedBy)
    {
        $token->status = 'revoked';
        $token->revoked_at = now();
        $token->revoked_by = $revokedBy;
        $token->save();
    }

    /**
     * Revoke all active tokens for a user.
     */
    public function revokeAllTokens(User $user, $revokedBy)
    {
        UserAuthToken::where('user_id', $user->id)
                     ->where('status', 'active')
                     ->update([
                         'status' => 'revoked',
                         'revoked_at' => now(),
                         'revoked_by' => $revokedBy
                     ]);
    }
}