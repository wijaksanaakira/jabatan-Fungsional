<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Services\AuditLogService;

class ProfileController extends Controller
{
    protected $auditLogger;

    public function __construct(AuditLogService $auditLogger)
    {
        $this->auditLogger = $auditLogger;
    }

    public function edit()
    {
        $user = Auth::user();
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $request->validate([
            'nama' => 'required|string|max:100',
            'email' => 'nullable|email|max:100',
            'username' => 'required|string|max:50|unique:user,username,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $oldData = $user->toArray();

        $user->nama = $request->nama;
        $user->email = $request->email;
        $user->username = $request->username;

        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        $this->auditLogger->log('Edit', 'Profile', $user, $oldData, $user->toArray(), 'User updated their profile.');

        return redirect()->back()->with('success', 'Profil berhasil diperbarui.');
    }
}
