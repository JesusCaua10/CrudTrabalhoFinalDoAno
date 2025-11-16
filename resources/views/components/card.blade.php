@props([
    'title' => '',     // Título do card
    'count' => null,   // Número grande ou valor principal
    'color' => 'blue'  // Cor principal: blue, green, purple, orange...
])

<div {{ $attributes->merge([
        'class' => 'bg-white shadow-md rounded-xl p-6 border'
    ]) }}>
    <h2 class="text-lg font-semibold text-gray-700">{{ $title }}</h2>
    @if($count !== null)
        <p class="text-3xl font-extrabold text-{{ $color }}-600 mt-2">
            {{ $count }}
        </p>
    @endif
    {{ $slot }}
</div>