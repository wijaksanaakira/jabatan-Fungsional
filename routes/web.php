<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\JabatanFungsionalController;
use App\Http\Controllers\MonitoringController;
use App\Http\Controllers\QrAuthenticationController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AuditLogController;

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

    Route::middleware('role:view')->group(function () {
        Route::get('jabatan-fungsional', [JabatanFungsionalController::class, 'index'])->name('jabatan.index');
        Route::get('jabatan-fungsional/{jabatan}', [JabatanFungsionalController::class, 'show'])->name('jabatan.show');

        Route::get('monitoring', [MonitoringController::class, 'index'])->name('monitoring.index');
        Route::get('monitoring/{monitoring}', [MonitoringController::class, 'show'])->name('monitoring.show');
    });

    Route::middleware('role:view,User')->group(function () {
        Route::get('user', [UserController::class, 'index'])->name('user.index');
    });

    Route::middleware('role:view,Audit Log')->group(function () {
        Route::get('audit-log', [AuditLogController::class, 'index'])->name('audit.index');
    });

    Route::middleware('role:view,QR Auth')->group(function () {
        Route::get('qr-auth', [QrAuthenticationController::class, 'index'])->name('qr.index');
    });
});
