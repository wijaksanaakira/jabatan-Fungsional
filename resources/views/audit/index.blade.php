@extends('layouts.app')

@section('content')
<div class="space-y-6">
    <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-4">
        <div>
            <h1 class="text-2xl font-bold text-slate-900">Audit Log</h1>
            <p class="mt-1 text-sm text-slate-500">Histori aktivitas sistem dan perubahan data.</p>
        </div>

        <form action="{{ route('audit.index') }}" method="GET" class="flex w-full sm:w-auto gap-2">
            <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari log..." class="w-full sm:w-64 px-4 py-2 border border-slate-300 rounded-lg focus:ring-2 focus:ring-blue-600 focus:border-transparent">
            <x-button type="secondary" type="submit">Cari</x-button>
        </form>
    </div>

    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 overflow-hidden">
        <ul role="list" class="divide-y divide-slate-200">
            @forelse($logs as $log)
            <li class="p-4 sm:p-6 hover:bg-slate-50 transition-colors">
                <div class="flex items-center justify-between mb-2">
                    <div class="flex items-center space-x-3">
                        @php
                            $actionColor = match(strtolower($log->action)) {
                                'login', 'qr login' => 'bg-emerald-100 text-emerald-600',
                                'logout' => 'bg-slate-100 text-slate-600',
                                'create', 'add' => 'bg-blue-100 text-blue-600',
                                'update', 'edit' => 'bg-amber-100 text-amber-600',
                                'delete', 'remove', 'revoke' => 'bg-red-100 text-red-600',
                                default => 'bg-indigo-100 text-indigo-600'
                            };

                            $actionIcon = match(strtolower($log->action)) {
                                'login', 'qr login' => 'bi-box-arrow-in-right',
                                'logout' => 'bi-box-arrow-right',
                                'create', 'add' => 'bi-plus-circle',
                                'update', 'edit' => 'bi-pencil-square',
                                'delete', 'remove', 'revoke' => 'bi-trash',
                                default => 'bi-info-circle'
                            };
                        @endphp
                        <span class="inline-flex items-center justify-center w-8 h-8 rounded-full {{ $actionColor }}">
                            <i class="bi {{ $actionIcon }}"></i>
                        </span>
                        <div>
                            <p class="text-sm font-semibold text-slate-900">
                                {{ $log->action }} <span class="font-normal text-slate-500">pada</span> {{ $log->module }}
                            </p>
                            <p class="text-xs text-slate-500 mt-0.5">Oleh: <span class="font-medium text-slate-700">{{ $log->user_name ?? 'Sistem' }}</span></p>
                        </div>
                    </div>
                    <div class="text-right">
                        <p class="text-sm text-slate-900">{{ $log->created_at->format('d M Y, H:i:s') }}</p>
                        <p class="text-xs text-slate-500 mt-0.5">{{ $log->ip_address }}</p>
                    </div>
                </div>

                @if($log->description)
                <div class="mt-2 ml-11">
                    <p class="text-sm text-slate-600">{{ $log->description }}</p>
                </div>
                @endif

                @if($log->subject_name)
                <div class="mt-2 ml-11">
                    <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-slate-100 text-slate-800">
                        Target: {{ $log->subject_name }}
                    </span>
                </div>
                @endif
            </li>
            @empty
            <li class="p-8 text-center text-slate-500">
                Belum ada histori aktivitas tercatat.
            </li>
            @endforelse
        </ul>
    </div>

    <div class="mt-4">
        {{ $logs->links() }}
    </div>
</div>
@endsection