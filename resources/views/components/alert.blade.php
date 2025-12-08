@props(['type' => 'success'])

@php
    $colors = [
        'success' => 'bg-green-600 text-white border-green-700',
        'error' => 'bg-red-600 text-white border-red-700',
        'warning' => 'bg-yellow-500 text-black border-yellow-600',
        'info' => 'bg-blue-600 text-white border-blue-700',
    ];
@endphp

<div class="p-3 rounded-lg border mb-4 {{ $colors[$type] }}">
    {{ $slot }}
</div>