@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Monitoring Dokumen</h1>
            <p class="mt-1 text-sm text-slate-500">Pantau kelengkapan dokumen persyaratan pegawai.</p>
        </div>

        <form action="{{ route('monitoring.index') }}" method="GET" class="flex flex-col sm:flex-row w-full sm:w-auto gap-2">
            <select name="status" class="px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                <option value="">Semua Status</option>
                <option value="Belum Diproses" {{ request('status') == 'Belum Diproses' ? 'selected' : '' }}>Belum Diproses</option>
                <option value="Proses" {{ request('status') == 'Proses' ? 'selected' : '' }}>Proses</option>
                <option value="Perlu Perbaikan" {{ request('status') == 'Perlu Perbaikan' ? 'selected' : '' }}>Perlu Perbaikan</option>
                <option value="Lengkap" {{ request('status') == 'Lengkap' ? 'selected' : '' }}>Lengkap</option>
            </select>
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama/NIP..." class="w-full sm:w-64 px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent">
            <x-button type="secondary" type="submit">Filter</x-button>
        </form>
    </div>

    <x-table>
        <x-slot name="header">
            <x-table.row>
                <x-table.header>Nama</x-table.header>
                <x-table.header>NIP</x-table.header>
                <x-table.header>Jabatan</x-table.header>
                <x-table.header>Status</x-table.header>
                <x-table.header>Progress</x-table.header>
                <x-table.header>Aksi</x-table.header>
            </x-table.row>
        </x-slot>

        @forelse($monitorings as $mon)
            <x-table.row>
                <x-table.cell>
                    <div class="font-medium text-slate-900">{{ $mon->nama }}</div>
                </x-table.cell>
                <x-table.cell>{{ $mon->nip }}</x-table.cell>
                <x-table.cell>{{ $mon->jabatanFungsional->nama ?? '-' }}</x-table.cell>
                <x-table.cell>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $mon->status_color }}">
                        {{ $mon->status }}
                    </span>
                </x-table.cell>
                <x-table.cell>
                    <div class="flex items-center">
                        <div class="w-24 bg-slate-200 rounded-full h-2 mr-2">
                            <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $mon->progress }}%"></div>
                        </div>
                        <span class="text-xs font-medium text-slate-500">{{ $mon->progress }}%</span>
                    </div>
                </x-table.cell>
                <x-table.cell>
                    <a href="{{ route('monitoring.show', $mon->id) }}" class="text-blue-600 hover:text-blue-900 font-medium">Detail</a>
                </x-table.cell>
            </x-table.row>
        @empty
            <x-table.row>
                <x-table.cell colspan="6" class="text-center py-8 text-slate-500">
                    Tidak ada data monitoring ditemukan.
                </x-table.cell>
            </x-table.row>
        @endforelse
    </x-table>

    <div class="mt-4">
        {{ $monitorings->links() }}
    </div>
</div>
@endsection