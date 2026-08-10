@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div>
        <h1 class="text-2xl font-bold text-slate-900">Dashboard</h1>
        <p class="mt-1 text-sm text-slate-500">Ringkasan Sistem Informasi Jabatan Fungsional.</p>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 gap-6 sm:grid-cols-2 lg:grid-cols-4">
        <!-- Card 1 -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center space-x-4">
            <div class="p-3 bg-blue-50 text-blue-600 rounded-xl">
                <i class="bi bi-briefcase text-2xl"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-slate-500">Total Jabatan</p>
                <p class="text-2xl font-bold text-slate-900">{{ number_format($stats['total_jabatan']) }}</p>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center space-x-4">
            <div class="p-3 bg-indigo-50 text-indigo-600 rounded-xl">
                <i class="bi bi-file-earmark-text text-2xl"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-slate-500">Total Dokumen</p>
                <p class="text-2xl font-bold text-slate-900">{{ number_format($stats['total_dokumen']) }}</p>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center space-x-4">
            <div class="p-3 bg-emerald-50 text-emerald-600 rounded-xl">
                <i class="bi bi-people text-2xl"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-slate-500">Total Pegawai</p>
                <p class="text-2xl font-bold text-slate-900">{{ number_format($stats['total_pegawai']) }}</p>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex items-center space-x-4">
            <div class="p-3 bg-purple-50 text-purple-600 rounded-xl">
                <i class="bi bi-activity text-2xl"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-slate-500">Total Monitoring</p>
                <p class="text-2xl font-bold text-slate-900">{{ number_format($stats['total_monitoring']) }}</p>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
        <!-- Monitoring Status -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
            <h3 class="text-lg font-semibold text-slate-900 mb-4">Status Monitoring Dokumen</h3>
            <div class="space-y-4">
                <div>
                    <div class="flex items-center justify-between mb-1">
                        <span class="text-sm font-medium text-slate-600">Selesai / Lengkap</span>
                        <span class="text-sm font-semibold text-emerald-600">{{ $stats['dokumen_lengkap'] }}</span>
                    </div>
                    <div class="w-full bg-slate-100 rounded-full h-2.5">
                        <div class="bg-emerald-500 h-2.5 rounded-full" style="width: {{ $stats['total_monitoring'] > 0 ? ($stats['dokumen_lengkap'] / $stats['total_monitoring']) * 100 : 0 }}%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex items-center justify-between mb-1">
                        <span class="text-sm font-medium text-slate-600">Dalam Proses</span>
                        <span class="text-sm font-semibold text-blue-600">{{ $stats['proses'] }}</span>
                    </div>
                    <div class="w-full bg-slate-100 rounded-full h-2.5">
                        <div class="bg-blue-500 h-2.5 rounded-full" style="width: {{ $stats['total_monitoring'] > 0 ? ($stats['proses'] / $stats['total_monitoring']) * 100 : 0 }}%"></div>
                    </div>
                </div>
                <div>
                    <div class="flex items-center justify-between mb-1">
                        <span class="text-sm font-medium text-slate-600">Perlu Perbaikan</span>
                        <span class="text-sm font-semibold text-red-600">{{ $stats['perlu_perbaikan'] }}</span>
                    </div>
                    <div class="w-full bg-slate-100 rounded-full h-2.5">
                        <div class="bg-red-500 h-2.5 rounded-full" style="width: {{ $stats['total_monitoring'] > 0 ? ($stats['perlu_perbaikan'] / $stats['total_monitoring']) * 100 : 0 }}%"></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Top Jabatan -->
        <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
            <h3 class="text-lg font-semibold text-slate-900 mb-4">Top 5 Jabatan (Jumlah Dokumen)</h3>
            <div class="space-y-4">
                @foreach($topJabatan as $jabatan)
                <div class="flex items-center justify-between p-3 bg-slate-50 rounded-xl">
                    <div class="flex items-center space-x-3">
                        <div class="w-10 h-10 rounded-lg bg-blue-100 text-blue-600 flex items-center justify-center font-bold">
                            {{ $loop->iteration }}
                        </div>
                        <div>
                            <p class="text-sm font-semibold text-slate-900">{{ $jabatan->nama }}</p>
                        </div>
                    </div>
                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-blue-100 text-blue-800">
                        {{ $jabatan->dokumen_jabatan_count }} Dokumen
                    </span>
                </div>
                @endforeach
            </div>
        </div>
    </div>

    @if(Auth::user()->isSuperAdmin() && count($recentActivities) > 0)
    <!-- Recent Activity -->
    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
        <div class="flex items-center justify-between mb-6">
            <h3 class="text-lg font-semibold text-slate-900">Aktivitas Terbaru</h3>
            <a href="{{ route('audit.index') }}" class="text-sm font-medium text-blue-600 hover:text-blue-500">Lihat Semua</a>
        </div>
        <div class="space-y-6">
            @foreach($recentActivities as $activity)
            <div class="flex gap-4">
                <div class="flex flex-col items-center">
                    <div class="w-2 h-2 bg-blue-500 rounded-full mt-2"></div>
                    @if(!$loop->last)
                    <div class="w-px h-full bg-slate-200 mt-2"></div>
                    @endif
                </div>
                <div class="pb-2">
                    <p class="text-sm font-medium text-slate-900">
                        <span class="font-bold">{{ $activity->user_name ?? 'Sistem' }}</span>
                        {{ strtolower($activity->action) }} pada {{ $activity->module }}
                    </p>
                    <p class="text-xs text-slate-500 mt-1">{{ $activity->description }}</p>
                    <p class="text-xs text-slate-400 mt-1">{{ $activity->created_at->format('d M Y, H:i') }}</p>
                </div>
            </div>
            @endforeach
        </div>
    </div>
    @endif
</div>
@endsection