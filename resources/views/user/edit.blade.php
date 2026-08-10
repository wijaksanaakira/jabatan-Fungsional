@extends('layouts.app')

@section('content')
<div class="space-y-6 max-w-3xl mx-auto">
    <div class="flex items-center gap-4">
        <a href="{{ route('user.index') }}" class="text-slate-400 hover:text-slate-600">
            <i class="bi bi-arrow-left text-xl"></i>
        </a>
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Edit Hak Akses Pengguna</h1>
            <p class="mt-1 text-sm text-slate-500">Perbarui informasi hak akses dan status pengguna.</p>
        </div>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6 sm:p-8">
        <div class="mb-6 pb-6 border-b border-slate-200">
            <h3 class="text-lg font-medium text-slate-900">Informasi Pengguna</h3>
            <div class="mt-4 grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <span class="block text-sm font-medium text-slate-500">Nama Lengkap</span>
                    <span class="block text-base text-slate-900">{{ $user->nama }}</span>
                </div>
                <div>
                    <span class="block text-sm font-medium text-slate-500">Username</span>
                    <span class="block text-base text-slate-900">{{ $user->username }}</span>
                </div>
                <div>
                    <span class="block text-sm font-medium text-slate-500">Email</span>
                    <span class="block text-base text-slate-900">{{ $user->email ?? '-' }}</span>
                </div>
                <div>
                    <span class="block text-sm font-medium text-slate-500">NIP</span>
                    <span class="block text-base text-slate-900">{{ $user->nip ?? '-' }}</span>
                </div>
            </div>
        </div>

        <form action="{{ route('user.update', $user->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Role / Level User -->
                <div>
                    <label for="id_user_level" class="block text-sm font-medium text-slate-700">Level / Hak Akses</label>
                    <select name="id_user_level" id="id_user_level" required
                        class="mt-1 block w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('id_user_level') border-red-500 @enderror">
                        @foreach($levels as $level)
                            <option value="{{ $level->id_user_level }}" {{ old('id_user_level', $user->id_user_level) == $level->id_user_level ? 'selected' : '' }}>
                                {{ $level->nama }}
                            </option>
                        @endforeach
                    </select>
                    @error('id_user_level')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>

                <!-- Status Aktif (QR Auth / Login) -->
                <div>
                    <label for="auth_act" class="block text-sm font-medium text-slate-700">Status Akses (Login)</label>
                    <select name="auth_act" id="auth_act" required
                        class="mt-1 block w-full px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('auth_act') border-red-500 @enderror">
                        <option value="enable" {{ old('auth_act', $user->auth_act) == 'enable' ? 'selected' : '' }}>Aktif (Enable)</option>
                        <option value="disable" {{ old('auth_act', $user->auth_act) == 'disable' ? 'selected' : '' }}>Nonaktif (Disable)</option>
                    </select>
                    @error('auth_act')
                        <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            <div class="flex justify-end pt-4 gap-3">
                <a href="{{ route('user.index') }}" class="px-6 py-2 bg-slate-100 text-slate-700 font-medium rounded-lg hover:bg-slate-200 transition-colors">
                    Batal
                </a>
                <button type="submit" class="px-6 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 focus:ring-4 focus:ring-blue-100 transition-colors">
                    Simpan Perubahan
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
