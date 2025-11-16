@props([
    'href' => '#',
    'color' => 'blue',
    'label' => ''
])

<a href="{{ $href }}"
   {{ $attributes->merge([
        'class' => "block bg-{$color}-600 hover:bg-{$color}-700 text-white rounded-xl p-5 text-center font-semibold shadow transition"
   ]) }}>
    {{ $slot ?? $label }}
</a>