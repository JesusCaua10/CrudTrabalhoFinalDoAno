@props(['href', 'color' => 'blue'])

@php
$bgHoverClasses = [
    'blue' => 'bg-blue-600 hover:bg-blue-500',
    'green' => 'bg-green-600 hover:bg-green-500',
    'purple' => 'bg-purple-600 hover:bg-purple-500',
    'orange' => 'bg-orange-500 hover:bg-orange-400',
    'yellow' => 'bg-yellow-500 hover:bg-yellow-400',
];
@endphp

<a href="{{ $href }}" class="block {{ $bgHoverClasses[$color] }} text-white shadow sm:rounded-lg p-6 transition">
    {{ $slot }}
</a>
