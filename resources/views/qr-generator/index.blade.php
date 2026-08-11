@extends('layouts.app')

@section('content')
<div class="max-w-2xl mx-auto space-y-6">
    <div>
        <h1 class="text-2xl font-bold text-slate-900">QR Code Generator</h1>
        <p class="mt-1 text-sm text-slate-500">Buat QR Code dari link atau URL.</p>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-100 p-6">
        <form action="{{ route('qr-generator.generate') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label for="url" class="block text-sm font-medium text-slate-700">Masukkan Link/URL <span class="text-red-500">*</span></label>
                <div class="mt-1 flex rounded-lg shadow-sm">
                    <span class="inline-flex items-center px-3 rounded-l-md border border-r-0 border-slate-300 bg-slate-50 text-slate-500 sm:text-sm">
                        <i class="bi bi-link-45deg"></i>
                    </span>
                    <input type="url" name="url" id="url" value="{{ old('url', $url ?? '') }}" placeholder="https://example.com" class="flex-1 min-w-0 block w-full px-4 py-2 border border-slate-300 rounded-none rounded-r-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent @error('url') border-red-500 @enderror" required>
                </div>
                @error('url') <p class="mt-1 text-sm text-red-500">{{ $message }}</p> @enderror
            </div>

            <div class="flex justify-end pt-4 border-t border-slate-100">
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white font-medium rounded-lg hover:bg-blue-700 transition-colors flex items-center">
                    <i class="bi bi-qr-code mr-2"></i> Generate QR Code
                </button>
            </div>
        </form>

        @if(isset($qrCode))
        <div class="mt-8 pt-8 border-t border-slate-100 flex flex-col items-center">
            <h3 class="text-lg font-medium text-slate-900 mb-4">Hasil QR Code</h3>

            <div class="p-4 bg-white border border-slate-200 rounded-xl shadow-sm">
                {!! $qrCode !!}
            </div>

            <p class="mt-4 text-sm text-slate-500 text-center break-all w-full max-w-md">
                URL: <a href="{{ $url }}" target="_blank" class="text-blue-600 hover:underline">{{ $url }}</a>
            </p>

            <div class="mt-6 flex gap-3">
                <a href="{{ route('qr-generator.index') }}" class="px-4 py-2 bg-white text-slate-700 font-medium rounded-lg border border-slate-300 hover:bg-slate-50 transition-colors">
                    Reset
                </a>
                <button onclick="window.print()" class="px-4 py-2 bg-slate-800 text-white font-medium rounded-lg hover:bg-slate-900 transition-colors flex items-center">
                    <i class="bi bi-printer mr-2"></i> Print
                </button>
            </div>
        </div>
        @endif
    </div>
</div>
@endsection
