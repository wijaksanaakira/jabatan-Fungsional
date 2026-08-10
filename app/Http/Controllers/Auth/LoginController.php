<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Services\AuditLogService;

class LoginController extends Controller
{
    protected $auditLogger;

    public function __construct(AuditLogService $auditLogger)
    {
        $this->auditLogger = $auditLogger;
    }

    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required_without:username'],
            'username' => ['required_without:email'],
            'password' => ['required'],
        ]);

        $remember = $request->boolean('remember');

        if (Auth::attempt($credentials, $remember)) {
            $user = Auth::user();

            if (!$user->isActive()) {
                Auth::logout();
                return back()->withErrors([
                    'error' => 'Akun Anda telah dinonaktifkan. Hubungi Administrator.',
                ])->onlyInput('email', 'username');
            }

            $user->update([
                'last_login_at' => now(),
                'last_login_ip' => $request->ip(),
            ]);

            $request->session()->regenerate();

            $this->auditLogger->log('Login', 'Authentication', $user, null, null, 'User logged in via password');

            return redirect()->intended('dashboard')->with('success', 'Selamat datang kembali!');
        }

        $this->auditLogger->log('Failed Login', 'Authentication', null, null, null, 'Failed login attempt for: ' . ($request->email ?? $request->username));

        return back()->withErrors([
            'email' => 'Kredensial yang diberikan tidak cocok dengan data kami.',
        ])->onlyInput('email', 'username');
    }

    public function logout(Request $request)
    {
        $user = Auth::user();

        if ($user) {
            $this->auditLogger->log('Logout', 'Authentication', $user, null, null, 'User logged out');
        }

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}