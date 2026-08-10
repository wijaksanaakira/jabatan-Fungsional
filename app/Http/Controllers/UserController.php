<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\LevelUser;
use Illuminate\Http\Request;
use App\Services\AuditLogService;

class UserController extends Controller
{
    protected $auditLogger;

    public function __construct(AuditLogService $auditLogger)
    {
        $this->auditLogger = $auditLogger;
    }

    public function index(Request $request)
    {
        $query = User::with('levelUser');

        if ($request->has('search')) {
            $search = $request->search;
            $query->where(function($q) use ($search) {
                $q->where('nama', 'like', "%{$search}%")
                  ->orWhere('email', 'like', "%{$search}%")
                  ->orWhere('nip', 'like', "%{$search}%");
            });
        }

        $users = $query->paginate(10)->withQueryString();

        return view('user.index', compact('users'));
    }

    public function edit(User $user)
    {
        // Prevent editing Super Admin unless the current user is a Super Admin
        if ($user->isSuperAdmin() && !auth()->user()->isSuperAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        $levels = LevelUser::all();
        return view('user.edit', compact('user', 'levels'));
    }

    public function update(Request $request, User $user)
    {
        // Prevent editing Super Admin unless the current user is a Super Admin
        if ($user->isSuperAdmin() && !auth()->user()->isSuperAdmin()) {
            abort(403, 'Unauthorized action.');
        }

        $request->validate([
            'id_user_level' => 'required|exists:level_user,id_user_level',
            'auth_act' => 'required|in:enable,disable',
        ]);

        $oldData = $user->toArray();
        $user->id_user_level = $request->id_user_level;
        $user->auth_act = $request->auth_act;
        $user->save();

        $this->auditLogger->log('Edit', 'User Management', $user, $oldData, $user->toArray(), 'User updated role and status for ' . $user->nama);

        return redirect()->route('user.index')->with('success', 'Hak akses dan status pengguna berhasil diperbarui.');
    }
}