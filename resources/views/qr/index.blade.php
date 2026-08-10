@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">QR Authentication</h1>
            <p class="mt-1 text-sm text-slate-500">Kelola akses login menggunakan QR Code untuk pengguna.</p>
        </div>

        <div class="flex gap-2">
            <x-button type="secondary">Pengaturan</x-button>
            <x-button type="primary"><i class="bi bi-qr-code mr-2"></i> Generate QR Masal</x-button>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
        <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100 flex items-center space-x-4">
            <div class="p-3 bg-emerald-50 text-emerald-600 rounded-xl">
                <i class="bi bi-check-circle text-xl"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-slate-500">QR Aktif</p>
                <p class="text-xl font-bold text-slate-900">{{ number_format($stats['aktif']) }}</p>
            </div>
        </div>
        <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100 flex items-center space-x-4">
            <div class="p-3 bg-red-50 text-red-600 rounded-xl">
                <i class="bi bi-x-circle text-xl"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-slate-500">QR Revoked</p>
                <p class="text-xl font-bold text-slate-900">{{ number_format($stats['revoked']) }}</p>
            </div>
        </div>
        <div class="bg-white p-5 rounded-2xl shadow-sm border border-slate-100 flex items-center space-x-4">
            <div class="p-3 bg-amber-50 text-amber-600 rounded-xl">
                <i class="bi bi-clock-history text-xl"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-slate-500">QR Kedaluwarsa</p>
                <p class="text-xl font-bold text-slate-900">{{ number_format($stats['expired']) }}</p>
            </div>
        </div>
    </div>

    <div class="bg-white p-4 rounded-xl border border-slate-200">
        <form action="{{ route('qr.index') }}" method="GET" class="flex flex-col sm:flex-row gap-3">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama/email..." class="w-full sm:max-w-xs px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent">
            <x-button type="secondary" type="submit">Filter</x-button>
        </form>
    </div>

    <x-table>
        <x-slot name="header">
            <x-table.row>
                <x-table.header>Pengguna</x-table.header>
                <x-table.header>Role</x-table.header>
                <x-table.header>Status QR</x-table.header>
                <x-table.header>Dibuat</x-table.header>
                <x-table.header>Terakhir Dipakai</x-table.header>
                <x-table.header>Aksi</x-table.header>
            </x-table.row>
        </x-slot>

        @forelse($tokens as $token)
            <x-table.row>
                <x-table.cell>
                    <div class="font-medium text-slate-900">{{ $token->user->nama ?? 'Unknown' }}</div>
                    <div class="text-xs text-slate-500">{{ $token->user->email ?? $token->user->username ?? '-' }}</div>
                </x-table.cell>
                <x-table.cell>
                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-slate-100 text-slate-800">
                        {{ $token->user->levelUser->nama ?? '-' }}
                    </span>
                </x-table.cell>
                <x-table.cell>
                    @if($token->status === 'active' && (!$token->expires_at || $token->expires_at->isFuture()))
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800">Aktif</span>
                    @elseif($token->status === 'revoked')
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">Revoked</span>
                    @else
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-amber-100 text-amber-800">Kedaluwarsa</span>
                    @endif
                </x-table.cell>
                <x-table.cell>
                    <div class="text-slate-900">{{ $token->created_at->format('d M Y') }}</div>
                    <div class="text-xs text-slate-500">Oleh: {{ $token->creator->nama ?? 'Sistem' }}</div>
                </x-table.cell>
                <x-table.cell>
                    @if($token->last_used_at)
                        <div class="text-slate-900">{{ $token->last_used_at->format('d M Y, H:i') }}</div>
                    @else
                        <span class="text-slate-400">Belum pernah</span>
                    @endif
                </x-table.cell>
                <x-table.cell>
                    @if($token->status === 'active')
                        <button class="text-blue-600 hover:text-blue-900 font-medium mr-3" title="Kirim Ulang"><i class="bi bi-send"></i></button>
                        <button class="text-red-600 hover:text-red-900 font-medium" title="Revoke"><i class="bi bi-slash-circle"></i></button>
                    @else
                        <button class="text-blue-600 hover:text-blue-900 font-medium" title="Generate Baru"><i class="bi bi-arrow-repeat"></i> Generate</button>
                    @endif
                </x-table.cell>
            </x-table.row>
        @empty
            <x-table.row>
                <x-table.cell colspan="6" class="text-center py-8 text-slate-500">
                    Tidak ada token QR ditemukan.
                </x-table.cell>
            </x-table.row>
        @endforelse
    </x-table>

    <div class="mt-4">
        {{ $tokens->links() }}
    </div>
</div>
@endsection