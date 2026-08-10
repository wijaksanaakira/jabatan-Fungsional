@extends('layouts.app')

@section('content')
<div class="space-y-6 max-w-3xl mx-auto">
    <div class="flex items-center gap-4">
        <a href="{{ route('jabatan.index') }}" class="text-slate-400 hover:text-slate-600">
            <i class="bi bi-arrow-left text-xl"></i>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Tambah Jabatan Fungsional</h1>
            <p class="mt-1 text-sm text-slate-500">Tambahkan daftar jabatan fungsional baru.</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 sm:p-8">
        <form action="{{ route('jabatan.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="nama" class="block text-sm font-medium text-slate-700">Nama Jabatan</label>
                <input type="text" name="nama" id="nama" value="{{ old('nama') }}" required
                    class="mt-1 block w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('nama') border-red-500 @enderror">
                @error('nama')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="status" class="block text-sm font-medium text-slate-700">Status</label>
                <select name="status" id="status" required class="mt-1 block w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('status') border-red-500 @enderror">
                    <option value="Aktif" {{ old('status') == 'Aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="Nonaktif" {{ old('status') == 'Nonaktif' ? 'selected' : '' }}>Nonaktif</option>
                </select>
                @error('status')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label for="keterangan" class="block text-sm font-medium text-slate-700">Keterangan</label>
                <textarea name="keterangan" id="keterangan" rows="3"
                    class="mt-1 block w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('keterangan') border-red-500 @enderror">{{ old('keterangan') }}</textarea>
                @error('keterangan')
                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end pt-4 gap-3">
                <a href="{{ route('jabatan.index') }}" class="px-6 py-2 bg-slate-100 text-slate-700 font-medium rounded-lg hover:bg-slate-200 transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-100 transition-colors">
                    Simpan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
