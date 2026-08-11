@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <div>
        <h1 class="text-2xl font-bold text-slate-900">Tambah Dokumen Jabatan</h1>
        <p class="mt-1 text-sm text-slate-500">Tambahkan dokumen baru untuk jabatan fungsional: {{ $jabatan->nama }}.</p>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
        <form action="{{ route('dokumen-jabatan.store') }}" method="POST" class="space-y-6">
            @csrf
            <input type="hidden" name="id_jabatan_fungsional" value="{{ $jabatan->id }}">

            <div>
                <label for="judul_dokumen" class="block text-sm font-medium text-slate-700">Judul Dokumen <span class="text-red-500">*</span></label>
                <input type="text" name="judul_dokumen" id="judul_dokumen" value="{{ old('judul_dokumen') }}" class="mt-1 block w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('judul_dokumen') border-red-500 @enderror" required>
                @error('judul_dokumen') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="nama_peraturan" class="block text-sm font-medium text-slate-700">Nama Peraturan</label>
                <input type="text" name="nama_peraturan" id="nama_peraturan" value="{{ old('nama_peraturan') }}" class="mt-1 block w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('nama_peraturan') border-red-500 @enderror">
                @error('nama_peraturan') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="link" class="block text-sm font-medium text-slate-700">Link Dokumen</label>
                <input type="url" name="link" id="link" value="{{ old('link') }}" class="mt-1 block w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('link') border-red-500 @enderror">
                @error('link') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="tanggal" class="block text-sm font-medium text-slate-700">Tanggal</label>
                    <input type="date" name="tanggal" id="tanggal" value="{{ old('tanggal') }}" class="mt-1 block w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('tanggal') border-red-500 @enderror">
                    @error('tanggal') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label for="jumlah_tunjangan" class="block text-sm font-medium text-slate-700">Jumlah Tunjangan (Rp)</label>
                    <input type="number" step="0.01" name="jumlah_tunjangan" id="jumlah_tunjangan" value="{{ old('jumlah_tunjangan', 0) }}" class="mt-1 block w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('jumlah_tunjangan') border-red-500 @enderror">
                    @error('jumlah_tunjangan') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
                </div>
            </div>

            <div>
                <label for="keterangan" class="block text-sm font-medium text-slate-700">Keterangan</label>
                <textarea name="keterangan" id="keterangan" rows="3" class="mt-1 block w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('keterangan') border-red-500 @enderror">{{ old('keterangan') }}</textarea>
                @error('keterangan') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-slate-700">Status <span class="text-red-500">*</span></label>
                <select name="status" id="status" class="mt-1 block w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('status') border-red-500 @enderror" required>
                    <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="Nonaktif" {{ old('status') == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
                @error('status') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
            </div>

            <div class="flex justify-end gap-3 pt-4 border-t border-slate-100">
                <a href="{{ route('jabatan.show', $jabatan->id) }}" class="px-4 py-2 bg-white text-slate-700 font-medium rounded-lg border border-slate-300 hover:bg-slate-50 transition-colors">Batal</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors">Simpan Dokumen</button>
            </div>
        </form>
    </div>
</div>
@endsection
