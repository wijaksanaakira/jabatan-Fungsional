@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Manajemen Dokumen</h1>
            <p class="mt-1 text-sm text-slate-500">Kelola daftar dokumen sistem.</p>
        </div>

        <div class="flex flex-col sm:flex-row w-full sm:w-auto gap-2">
            <form action="{{ route('dokumen.index') }}" method="GET" class="flex w-full sm:w-auto gap-2">
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama dokumen..." class="w-full sm:w-64 px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent">
                <button type="submit" class="px-4 py-2 bg-slate-100 text-slate-700 font-medium rounded-lg hover:bg-slate-200 transition-colors">Cari</button>
            </form>
            <a href="{{ route('dokumen.create') }}" class="px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors text-center">
                Tambah Dokumen
            </a>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-slate-200">
                <thead class="bg-slate-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Nama Dokumen</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Link</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-slate-500 uppercase tracking-wider">Dibuat Pada</th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-slate-500 uppercase tracking-wider">Aksi</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-slate-200">
                    @forelse($dokumens as $dokumen)
                        <tr>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <div class="font-medium text-slate-900">{{ $dokumen->nama_file }}</div>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap">
                                <a href="{{ $dokumen->link }}" target="_blank" class="text-blue-600 hover:underline">{{ Str::limit($dokumen->link, 30) }}</a>
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-sm text-slate-500">
                                {{ $dokumen->created_at ? $dokumen->created_at->format('d M Y') : '-' }}
                            </td>
                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                <a href="{{ route('dokumen.edit', $dokumen->id) }}" class="text-indigo-600 hover:text-indigo-900 mr-3">Edit</a>
                                <form action="{{ route('dokumen.destroy', $dokumen->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Apakah Anda yakin ingin menghapus dokumen ini?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="4" class="px-6 py-8 text-center text-slate-500">
                                Tidak ada dokumen ditemukan.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <div class="px-6 py-4 border-t border-slate-200">
            {{ $dokumens->links() }}
        </div>
    </div>
</div>
@endsection
