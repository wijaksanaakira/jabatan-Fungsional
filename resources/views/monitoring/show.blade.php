@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div class="flex items-center space-x-2 text-sm text-slate-500 mb-4">
        <a href="{{ route('dashboard') }}" class="hover:text-blue-600">Dashboard</a>
        <span>/</span>
        <a href="{{ route('monitoring.index') }}" class="hover:text-blue-600">Monitoring</a>
        <span>/</span>
        <span class="text-slate-900 font-medium">Detail</span>
    </div>

    <!-- Header Card -->
    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div class="flex items-center space-x-4">
            <div class="h-16 w-16 bg-blue-100 text-blue-600 rounded-full flex items-center justify-center text-2xl font-bold">
                {{ substr($monitoring->nama, 0, 1) }}
            </div>
            <div>
                <h1 class="text-2xl font-bold text-slate-900">{{ $monitoring->nama }}</h1>
                <p class="text-sm text-slate-500">{{ $monitoring->nip ?? '-' }} • {{ $monitoring->jabatanFungsional->nama ?? '-' }}</p>
            </div>
        </div>
        <div class="text-right">
            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $monitoring->status_color }}">
                {{ $monitoring->status }}
            </span>
            <div class="mt-2 flex items-center justify-end">
                <span class="text-sm font-medium text-slate-700 mr-2">Progress:</span>
                <div class="w-32 bg-slate-200 rounded-full h-2">
                    <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $monitoring->progress }}%"></div>
                </div>
                <span class="text-sm font-medium text-slate-700 ml-2">{{ $monitoring->progress }}%</span>
            </div>
        </div>
    </div>

    <!-- Details and Checklist -->
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        <div class="lg:col-span-1 space-y-6">
            <!-- Info Pegawai -->
            <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100">
                <h3 class="text-lg font-semibold text-slate-900 mb-4">Informasi Pegawai</h3>
                <dl class="space-y-3 text-sm">
                    <div class="grid grid-cols-3 gap-2">
                        <dt class="text-slate-500 font-medium">Nama</dt>
                        <dd class="col-span-2 text-slate-900">{{ $monitoring->nama }}</dd>
                    </div>
                    <div class="grid grid-cols-3 gap-2 border-t border-slate-100 pt-3">
                        <dt class="text-slate-500 font-medium">NIP</dt>
                        <dd class="col-span-2 text-slate-900">{{ $monitoring->nip ?? '-' }}</dd>
                    </div>
                    <div class="grid grid-cols-3 gap-2 border-t border-slate-100 pt-3">
                        <dt class="text-slate-500 font-medium">Jabatan</dt>
                        <dd class="col-span-2 text-slate-900">{{ $monitoring->jabatanFungsional->nama ?? '-' }}</dd>
                    </div>
                    <div class="grid grid-cols-3 gap-2 border-t border-slate-100 pt-3">
                        <dt class="text-slate-500 font-medium">Unit Kerja</dt>
                        <dd class="col-span-2 text-slate-900">{{ $monitoring->unit_kerja ?? '-' }}</dd>
                    </div>
                    <div class="grid grid-cols-3 gap-2 border-t border-slate-100 pt-3">
                        <dt class="text-slate-500 font-medium">No. HP</dt>
                        <dd class="col-span-2 text-slate-900">{{ $monitoring->nomor_hp ?? '-' }}</dd>
                    </div>
                </dl>
            </div>

            @if($monitoring->catatan)
            <div class="bg-yellow-50 p-6 rounded-2xl border border-yellow-100">
                <h3 class="text-sm font-semibold text-yellow-800 flex items-center mb-2">
                    <i class="bi bi-exclamation-triangle-fill mr-2"></i> Catatan Monitoring
                </h3>
                <p class="text-sm text-yellow-700">{{ $monitoring->catatan }}</p>
            </div>
            @endif
        </div>

        <div class="lg:col-span-2">
            <!-- Checklist -->
            <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
                <div class="px-6 py-4 border-b border-slate-200 bg-slate-50 flex justify-between items-center">
                    <h3 class="text-lg font-semibold text-slate-900">Checklist Persyaratan</h3>
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-200">
                        <thead class="bg-white">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Dokumen</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Sifat</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase">File</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200 bg-white">
                            @forelse($monitoring->items as $item)
                            <tr>
                                <td class="px-6 py-4 text-sm text-slate-900">
                                    <div class="font-medium">{{ $item->nama_dokumen }}</div>
                                    @if($item->catatan)
                                    <div class="text-xs text-red-500 mt-1">{{ $item->catatan }}</div>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm">
                                    @if($item->wajib)
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-red-100 text-red-800">Wajib</span>
                                    @else
                                        <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-slate-100 text-slate-800">Opsional</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @php
                                        $statusClass = match($item->status) {
                                            'Belum Ada' => 'bg-gray-100 text-gray-800',
                                            'Diterima' => 'bg-blue-100 text-blue-800',
                                            'Diverifikasi', 'Lengkap' => 'bg-green-100 text-green-800',
                                            'Perlu Perbaikan' => 'bg-red-100 text-red-800',
                                            'N/A' => 'bg-slate-200 text-slate-600',
                                            default => 'bg-gray-100 text-gray-800'
                                        };
                                    @endphp
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $statusClass }}">
                                        {{ $item->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    @if($item->link)
                                        <a href="{{ $item->link }}" target="_blank" class="text-blue-600 hover:text-blue-900">Lihat File</a>
                                    @elseif($item->file_path)
                                        <a href="#" class="text-blue-600 hover:text-blue-900">Unduh</a>
                                    @else
                                        <span class="text-slate-400">-</span>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="4" class="px-6 py-4 text-center text-sm text-slate-500">Belum ada checklist.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection