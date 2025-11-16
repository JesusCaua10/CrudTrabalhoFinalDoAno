@props([
    'type' => 'submit'
])

<button 
    type="{{ $type }}"
    {{ $attributes->merge([
        'class' => 'bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded-lg shadow transition'
    ]) }}
>
    {{ $slot }}
</button>