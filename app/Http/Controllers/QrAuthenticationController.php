<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\UserAuthToken;
use App\Services\QrAuthenticationService;
use App\Services\AuditLogService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QrAuthenticationController extends Controller
{
    protected $qrService;
    protected $auditLogger;

    public function __construct(QrAuthenticationService $qrService, AuditLogService $auditLogger)
    {
        $this->qrService = $qrService;
        $this->auditLogger = $auditLogger;
    }

    public function index(Request $request)
    {
        $query = UserAuthToken::with(['user.levelUser', 'creator'])
            ->where('type', 'qr_login');

        if ($request->has('search')) {
            $search = $request->search;
            $query->whereHas('user', function($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%");
            });
        }

        $tokens = $query->latest()->paginate(10)->withQueryString();

        $stats = [
            'aktif' => UserAuthToken::where('status', 'active')->count(),
            'revoked' => UserAuthToken::where('status', 'revoked')->count(),
            'expired' => UserAuthToken::where('expires_at', '<', now())->count(),
        ];

        return view('qr.index', compact('tokens', 'stats'));
    }

    public function login(Request $request)
    {
        $request->validate([
            'token' => 'required|string'
        ]);

        $user = $this->qrService->authenticateWithToken($request->token);

        if ($user) {
            $request->session()->regenerate();
            $this->auditLogger->log('QR Login', 'Authentication', $user, null, null, 'User logged in via QR Code');
            return response()->json(['success' => true, 'redirect' => route('dashboard')]);
        }

        $this->auditLogger->log('Failed QR Login', 'Authentication', null, null, null, 'Failed QR login attempt');
        return response()->json(['success' => false, 'message' => 'QR Code tidak valid, kedaluwarsa, atau akun dinonaktifkan.'], 401);
    }
}