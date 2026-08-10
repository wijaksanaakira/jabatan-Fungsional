@props(['type' => 'success', 'message'])

@php
    $icon = match($type) {
        'success' => 'bi-check-circle-fill text-emerald-500',
        'error' => 'bi-exclamation-circle-fill text-red-500',
        'warning' => 'bi-exclamation-triangle-fill text-yellow-500',
        'info' => 'bi-info-circle-fill text-blue-500',
        default => 'bi-info-circle-fill text-blue-500',
    };
@endphp

<div x-data="{ show: true }"
     x-show="show"
     x-init="setTimeout(() => show = false, 5000)"
     class="fixed top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 z-50 flex items-center p-4 bg-white rounded-lg shadow-xl border border-slate-200 min-w-[300px] max-w-md"
     x-transition:enter="transform ease-out duration-300 transition"
     x-transition:enter-start="translate-y-4 opacity-0 scale-95"
     x-transition:enter-end="translate-y-0 opacity-100 scale-100"
     x-transition:leave="transition ease-in duration-100"
     x-transition:leave-start="opacity-100 scale-100"
     x-transition:leave-end="opacity-0 scale-95">
    <div class="flex-shrink-0">
        <i class="bi {{ $icon }} text-xl"></i>
    </div>
    <div class="ml-3 w-0 flex-1 pt-0.5">
        <p class="text-sm font-medium text-slate-900">{{ $message }}</p>
    </div>
    <div class="ml-4 flex flex-shrink-0">
        <button @click="show = false" type="button" class="inline-flex rounded-md bg-white text-slate-400 hover:text-slate-500 focus:outline-none focus:ring-2 focus:ring-slate-500 focus:ring-offset-2">
            <span class="sr-only">Close</span>
            <i class="bi bi-x-lg"></i>
        </button>
    </div>
</div>