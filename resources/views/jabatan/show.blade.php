@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div class="flex items-center space-x-2 text-sm text-slate-500 mb-4">
        <a href="{{ route('dashboard') }}" class="hover:text-blue-600">Dashboard</a>
        <span>/</span>
        <a href="{{ route('jabatan.index') }}" class="hover:text-blue-600">Jabatan Fungsional</a>
        <span>/</span>
        <span class="text-slate-900 font-medium">{{ $jabatan->nama }}</span>
    </div>

    <div class="bg-white p-6 rounded-2xl shadow-sm border border-slate-100 flex flex-col md:flex-row justify-between items-start md:items-center gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-900 uppercase">{{ $jabatan->nama }}</h1>
            <div class="flex items-center mt-2 space-x-4">
                <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $jabatan->status == 'Aktif' ? 'bg-green-100 text-green-800' : 'bg-red-100 text-red-800' }}">
                    {{ $jabatan->status }}
                </span>
            </div>
        </div>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
        <div class="bg-white p-4 rounded-xl shadow-sm border border-slate-100 text-center">
            <p class="text-3xl font-bold text-blue-600">{{ $jabatan->dokumen_jabatan_count }}</p>
            <p class="text-sm font-medium text-slate-500 mt-1">Dokumen</p>
        </div>
        <div class="bg-white p-4 rounded-xl shadow-sm border border-slate-100 text-center">
            <p class="text-3xl font-bold text-purple-600">{{ $jabatan->persyaratan_count }}</p>
            <p class="text-sm font-medium text-slate-500 mt-1">Persyaratan</p>
        </div>
        <div class="bg-white p-4 rounded-xl shadow-sm border border-slate-100 text-center">
            <p class="text-3xl font-bold text-emerald-600">{{ $jabatan->monitoring_count }}</p>
            <p class="text-sm font-medium text-slate-500 mt-1">Monitoring</p>
        </div>
        <div class="bg-white p-4 rounded-xl shadow-sm border border-slate-100 text-center">
            <p class="text-xl font-bold text-slate-700 mt-2">Rp {{ number_format($dokumens->sum('jumlah_tunjangan'), 0, ',', '.') }}</p>
            <p class="text-sm font-medium text-slate-500 mt-1">Total Tunjangan</p>
        </div>
    </div>

    <div x-data="{ tab: 'dokumen' }" class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="border-b border-slate-200">
            <nav class="flex -mb-px" aria-label="Tabs">
                <button @click="tab = 'dokumen'" :class="tab === 'dokumen' ? 'border-blue-500 text-blue-600' : 'border-transparent text-slate-500 hover:border-slate-300 hover:text-slate-700'" class="w-1/3 py-4 px-1 text-center border-b-2 font-medium text-sm">
                    Dokumen Jabatan
                </button>
                <button @click="tab = 'persyaratan'" :class="tab === 'persyaratan' ? 'border-blue-500 text-blue-600' : 'border-transparent text-slate-500 hover:border-slate-300 hover:text-slate-700'" class="w-1/3 py-4 px-1 text-center border-b-2 font-medium text-sm">
                    Persyaratan
                </button>
                <button @click="tab = 'monitoring'" :class="tab === 'monitoring' ? 'border-blue-500 text-blue-600' : 'border-transparent text-slate-500 hover:border-slate-300 hover:text-slate-700'" class="w-1/3 py-4 px-1 text-center border-b-2 font-medium text-sm">
                    Monitoring
                </button>
            </nav>
        </div>

        <div class="p-6">
            <!-- Dokumen Tab -->
            <div x-show="tab === 'dokumen'">
                <div class="flex justify-between items-center mb-4">
                    <h3 class="text-lg font-medium text-slate-900">Dokumen Jabatan</h3>
                    @if(auth()->user()->isSuperAdmin() || auth()->user()->isAdmin())
                        <a href="{{ route('dokumen-jabatan.create', ['jabatan_id' => $jabatan->id]) }}" class="px-3 py-1.5 bg-blue-600 text-white text-sm font-medium rounded-lg hover:bg-blue-700 transition-colors">
                            Tambah Dokumen
                        </a>
                    @endif
                </div>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-200">
                        <thead class="bg-slate-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Judul Dokumen</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Peraturan</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Tunjangan</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200 bg-white">
                            @forelse($dokumens as $dok)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-900">{{ $dok->judul_dokumen }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500">{{ $dok->nama_peraturan }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500">Rp {{ number_format($dok->jumlah_tunjangan, 0, ',', '.') }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    @if($dok->link)
                                    <a href="{{ $dok->link }}" target="_blank" class="text-blue-600 hover:text-blue-900 mr-2">Lihat File</a>
                                    @endif
                                    @if(auth()->user()->isSuperAdmin() || auth()->user()->isAdmin())
                                        <a href="{{ route('dokumen-jabatan.edit', $dok->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-2">Edit</a>
                                        <form action="{{ route('dokumen-jabatan.destroy', $dok->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus dokumen ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="4" class="px-6 py-4 text-center text-sm text-slate-500">Belum ada dokumen.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">{{ $dokumens->links() }}</div>
            </div>

            <!-- Persyaratan Tab -->
            <div x-show="tab === 'persyaratan'" style="display: none;">
                <h3 class="text-lg font-medium text-slate-900 mb-4">Persyaratan Jabatan</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-200">
                        <thead class="bg-slate-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Nama Persyaratan</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Wajib</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200 bg-white">
                            @forelse($persyaratans as $req)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-900">{{ $req->nama_file }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500">
                                    @if($req->pivot->wajib)
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-red-100 text-red-800">Wajib</span>
                                    @else
                                        <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-100 text-slate-800">Opsional</span>
                                    @endif
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    @if($req->link)
                                    <a href="{{ $req->link }}" target="_blank" class="text-blue-600 hover:text-blue-900">Lihat Template</a>
                                    @endif
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="3" class="px-6 py-4 text-center text-sm text-slate-500">Belum ada persyaratan.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">{{ $persyaratans->links() }}</div>
            </div>

            <!-- Monitoring Tab -->
            <div x-show="tab === 'monitoring'" style="display: none;">
                <h3 class="text-lg font-medium text-slate-900 mb-4">Monitoring Terkait</h3>
                <div class="overflow-x-auto">
                    <table class="min-w-full divide-y divide-slate-200">
                        <thead class="bg-slate-50">
                            <tr>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Nama Pegawai</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase">NIP</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Status</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Progress</th>
                                <th class="px-6 py-3 text-left text-xs font-semibold text-slate-500 uppercase">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-200 bg-white">
                            @forelse($monitorings as $mon)
                            <tr>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-slate-900">{{ $mon->nama }}</td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500">{{ $mon->nip }}</td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $mon->status_color }}">
                                        {{ $mon->status }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="w-full bg-slate-200 rounded-full h-2 mr-2">
                                            <div class="bg-blue-600 h-2 rounded-full" style="width: {{ $mon->progress }}%"></div>
                                        </div>
                                        <span class="text-xs text-slate-500">{{ $mon->progress }}%</span>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <a href="{{ route('monitoring.show', $mon->id) }}" class="text-blue-600 hover:text-blue-900">Lihat Progress</a>
                                </td>
                            </tr>
                            @empty
                            <tr><td colspan="5" class="px-6 py-4 text-center text-sm text-slate-500">Belum ada data monitoring.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div class="mt-4">{{ $monitorings->links() }}</div>
            </div>
        </div>
    </div>
</div>
@endsection