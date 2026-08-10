@props(['type' => 'primary', 'href' => null])

@php
    $baseClasses = 'inline-flex items-center justify-center px-4 py-2 text-sm font-medium rounded-lg shadow-sm focus:outline-none focus:ring-2 focus:ring-offset-2 transition-colors duration-200';

    $typeClasses = match ($type) {
        'primary' => 'bg-blue-600 text-white hover:bg-blue-700 focus:ring-blue-500',
        'secondary' => 'bg-slate-100 text-slate-700 hover:bg-slate-200 focus:ring-slate-500 border border-slate-200',
        'danger' => 'bg-red-600 text-white hover:bg-red-700 focus:ring-red-500',
        'success' => 'bg-emerald-600 text-white hover:bg-emerald-700 focus:ring-emerald-500',
        default => 'bg-blue-600 text-white hover:bg-blue-700 focus:ring-blue-500',
    };
@endphp

@if ($href)
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $baseClasses . ' ' . $typeClasses]) }}>
        {{ $slot }}
    </a>
@else
    <button {{ $attributes->merge(['class' => $baseClasses . ' ' . $typeClasses]) }}>
        {{ $slot }}
    </button>
@endif