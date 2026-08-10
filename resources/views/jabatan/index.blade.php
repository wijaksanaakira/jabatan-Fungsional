@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Jabatan Fungsional</h1>
            <p class="mt-1 text-sm text-slate-500">Kelola daftar jabatan fungsional dan dokumennya.</p>
        </div>

        <form action="{{ route('jabatan.index') }}" method="GET" class="flex w-full sm:w-auto gap-2">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari jabatan..." class="w-full sm:w-64 px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent">
            <x-button type="secondary" type="submit">Cari</x-button>
        </form>
    </div>

    <x-table>
        <x-slot name="header">
            <x-table.row>
                <x-table.header>Nama Jabatan</x-table.header>
                <x-table.header class="text-right">Dokumen</x-table.header>
                <x-table.header class="text-right">Persyaratan</x-table.header>
                <x-table.header class="text-right">Monitoring</x-table.header>
                <x-table.header>Status</x-table.header>
                <x-table.header>Aksi</x-table.header>
            </x-table.row>
        </x-slot>

        @forelse($jabatans as $jabatan)
            <x-table.row>
                <x-table.cell>
                    <div class="font-medium text-slate-900">{{ $jabatan->nama }}</div>
                </x-table.cell>
                <x-table.cell class="text-right">
                    <span class="inline-flex items-center justify-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                        {{ $jabatan->dokumen_jabatan_count }}
                    </span>
                </x-table.cell>
                <x-table.cell class="text-right">
                    <span class="inline-flex items-center justify-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-purple-100 text-purple-800">
                        {{ $jabatan->persyaratan_count }}
                    </span>
                </x-table.cell>
                <x-table.cell class="text-right">
                    <span class="inline-flex items-center justify-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-100 text-emerald-800">
                        {{ $jabatan->monitoring_count }}
                    </span>
                </x-table.cell>
                <x-table.cell>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $jabatan->status == 'Aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                        {{ $jabatan->status }}
                    </span>
                </x-table.cell>
                <x-table.cell>
                    <a href="{{ route('jabatan.show', $jabatan->id) }}" class="text-blue-600 hover:text-blue-900 font-medium">Detail</a>
                </x-table.cell>
            </x-table.row>
        @empty
            <x-table.row>
                <x-table.cell colspan="6" class="text-center py-8 text-slate-500">
                    Tidak ada data jabatan fungsional.
                </x-table.cell>
            </x-table.row>
        @endforelse
    </x-table>

    <div class="mt-4">
        {{ $jabatans->links() }}
    </div>
</div>
@endsection