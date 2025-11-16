@props([
    'name' => '', 
    'type' => 'text', 
    'value' => '', 
    'id' => null, 
    'placeholder' => '', 
    'readonly' => false
])

<input 
    id="{{ $id ?? $name }}"
    name="{{ $name }}"
    type="{{ $type }}"
    value="{{ $value }}"
    placeholder="{{ $placeholder }}"
    {{ $readonly ? 'readonly' : '' }}
    {{ $attributes->merge([
        'class' => 'w-full p-3 border rounded-lg focus:outline-none focus:ring focus:ring-blue-200'
    ]) }}
/>