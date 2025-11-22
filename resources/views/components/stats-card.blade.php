@props(['title', 'count', 'color' => 'blue'])

@php
$bgClasses = [
    'blue' => 'bg-blue-600',
    'green' => 'bg-green-600',
    'purple' => 'bg-purple-600',
    'orange' => 'bg-orange-500',
    'yellow' => 'bg-yellow-500',
];

$borderClasses = [
    'blue' => 'border-blue-400',
    'green' => 'border-green-400',
    'purple' => 'border-purple-400',
    'orange' => 'border-orange-300',
    'yellow' => 'border-yellow-300',
];
@endphp

<div class="bg-white shadow sm:rounded-lg p-6 border-l-4 {{ $borderClasses[$color] }}">
    <div class="text-sm text-black">{{ $title }}</div>
    <div class="text-3xl font-bold text-black">{{ $count }}</div>
</div>
