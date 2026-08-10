@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">User Management</h1>
            <p class="mt-1 text-sm text-slate-500">Kelola pengguna, hak akses, dan status akun.</p>
        </div>

        <form action="{{ route('user.index') }}" method="GET" class="flex w-full sm:w-auto gap-2">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama/email..." class="w-full sm:w-64 px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent">
            <x-button type="secondary" type="submit">Cari</x-button>
        </form>
    </div>

    <x-table>
        <x-slot name="header">
            <x-table.row>
                <x-table.header>Pengguna</x-table.header>
                <x-table.header>Role</x-table.header>
                <x-table.header>Status</x-table.header>
                <x-table.header>Login Terakhir</x-table.header>
                <x-table.header>Aksi</x-table.header>
            </x-table.row>
        </x-slot>

        @forelse($users as $user)
            <x-table.row>
                <x-table.cell>
                    <div class="flex items-center">
                        <div class="h-10 w-10 flex-shrink-0 rounded-full bg-blue-100 text-blue-600 flex items-center justify-center font-bold">
                            {{ substr($user->nama, 0, 1) }}
                        </div>
                        <div class="ml-4">
                            <div class="font-medium text-slate-900">{{ $user->nama }}</div>
                            <div class="text-slate-500">{{ $user->email ?? $user->username }}</div>
                        </div>
                    </div>
                </x-table.cell>
                <x-table.cell>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-indigo-100 text-indigo-800">
                        {{ $user->levelUser->nama ?? 'Unknown' }}
                    </span>
                </x-table.cell>
                <x-table.cell>
                    @if($user->isActive())
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-green-100 text-green-800">Aktif</span>
                    @else
                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">Nonaktif</span>
                    @endif
                </x-table.cell>
                <x-table.cell>
                    @if($user->last_login_at)
                        <div class="text-slate-900">{{ $user->last_login_at->format('d M Y, H:i') }}</div>
                        <div class="text-xs text-slate-500">{{ $user->last_login_ip }}</div>
                    @else
                        <span class="text-slate-500">-</span>
                    @endif
                </x-table.cell>
                <x-table.cell>
                    <a href="{{ route('user.edit', $user->id) }}" class="text-blue-600 hover:text-blue-900 font-medium mr-3">Edit</a>
                    @if(Auth::user()->isSuperAdmin() && $user->id !== Auth::id())
                        <!-- Placeholder for explicit disable button if needed, but it's handled in edit form -->
                    @endif
                </x-table.cell>
            </x-table.row>
        @empty
            <x-table.row>
                <x-table.cell colspan="5" class="text-center py-8 text-slate-500">
                    Tidak ada pengguna ditemukan.
                </x-table.cell>
            </x-table.row>
        @endforelse
    </x-table>

    <div class="mt-4">
        {{ $users->links() }}
    </div>
</div>
@endsection