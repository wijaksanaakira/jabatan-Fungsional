<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JabatanFungsionalController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\QrAuthenticationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuditLogController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DokumenController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::middleware('guest')->group(function () {
    Route::get('login', [LoginController::class, 'showLoginForm'])->name('login');
    Route::post('login', [LoginController::class, 'login'])->name('login.post');
    Route::post('qr-login', [QrAuthenticationController::class, 'login'])->name('qr.login');
});

Route::middleware('auth')->group(function () {
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::get('profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('profile', [ProfileController::class, 'update'])->name('profile.update');

    // Monitoring - Read Only
    Route::middleware('role:view')->group(function () {
        Route::get('monitoring', [MonitoringController::class, 'index'])->name('monitoring.index');
        Route::get('monitoring/{monitoring}', [MonitoringController::class, 'show'])->name('monitoring.show');
    });

    // Jabatan Fungsional
    Route::middleware('role:view')->get('jabatan-fungsional', [JabatanFungsionalController::class, 'index'])->name('jabatan.index');
    Route::middleware('role:create')->get('jabatan-fungsional/create', [JabatanFungsionalController::class, 'create'])->name('jabatan.create');
    Route::middleware('role:create')->post('jabatan-fungsional', [JabatanFungsionalController::class, 'store'])->name('jabatan.store');
    Route::middleware('role:view')->get('jabatan-fungsional/{jabatan}', [JabatanFungsionalController::class, 'show'])->name('jabatan.show');
    Route::middleware('role:edit')->get('jabatan-fungsional/{jabatan}/edit', [JabatanFungsionalController::class, 'edit'])->name('jabatan.edit');
    Route::middleware('role:edit')->put('jabatan-fungsional/{jabatan}', [JabatanFungsionalController::class, 'update'])->name('jabatan.update');
    Route::middleware('role:delete')->delete('jabatan-fungsional/{jabatan}', [JabatanFungsionalController::class, 'destroy'])->name('jabatan.destroy');

    // Dokumen
    Route::middleware('role:view')->get('dokumen', [DokumenController::class, 'index'])->name('dokumen.index');
    Route::middleware('role:create')->get('dokumen/create', [DokumenController::class, 'create'])->name('dokumen.create');
    Route::middleware('role:create')->post('dokumen', [DokumenController::class, 'store'])->name('dokumen.store');
    Route::middleware('role:edit')->get('dokumen/{dokuman}/edit', [DokumenController::class, 'edit'])->name('dokumen.edit');
    Route::middleware('role:edit')->put('dokumen/{dokuman}', [DokumenController::class, 'update'])->name('dokumen.update');
    Route::middleware('role:delete')->delete('dokumen/{dokuman}', [DokumenController::class, 'destroy'])->name('dokumen.destroy');

    Route::middleware('role:view,User')->group(function () {
        Route::get('user', [UserController::class, 'index'])->name('user.index');
        Route::get('user/{user}/edit', [UserController::class, 'edit'])->name('user.edit');
        Route::put('user/{user}', [UserController::class, 'update'])->name('user.update');
    });

    Route::middleware('role:view,Audit Log')->group(function () {
        Route::get('audit-log', [AuditLogController::class, 'index'])->name('audit.index');
    });

    Route::middleware('role:view,QR Auth')->group(function () {
        Route::get('qr-auth', [QrAuthenticationController::class, 'index'])->name('qr.index');
    });
});
