@extends('layouts.app')

@section('content')
<div class="space-y-6 max-w-3xl mx-auto">
    <div class="flex items-center gap-4">
        <a href="{{ route('dokumen.index') }}" class="text-slate-400 hover:text-slate-600">
            <i class="bi bi-arrow-left text-xl"></i>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Tambah Dokumen</h1>
            <p class="mt-1 text-sm text-slate-500">Tambahkan dokumen baru ke dalam sistem.</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 sm:p-8">
        <form action="{{ route('dokumen.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="nama_file" class="block text-sm font-medium text-slate-700">Nama File Dokumen</label>
                <input type="text" name="nama_file" id="nama_file" value="{{ old('nama_file') }}" required
                    class="mt-1 block w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('nama_file') border-red-500 @enderror">
                @error('nama_file')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="link" class="block text-sm font-medium text-slate-700">Link Dokumen (URL)</label>
                <input type="url" name="link" id="link" value="{{ old('link') }}" required
                    placeholder="https://..."
                    class="mt-1 block w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('link') border-red-500 @enderror">
                @error('link')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end pt-4 gap-3">
                <a href="{{ route('dokumen.index') }}" class="px-6 py-2 bg-slate-100 text-slate-700 font-medium rounded-lg hover:bg-slate-200 transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-100 transition-colors">
                    Simpan Dokumen
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
