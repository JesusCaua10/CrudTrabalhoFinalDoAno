@props([
    'name' => '', 
    'id' => null
])

<select 
    name="{{ $name }}" 
    id="{{ $id ?? $name }}"
    {{ $attributes->merge([
        'class' => 'w-full p-3 border rounded-lg focus:outline-none focus:ring focus:ring-blue-200'
    ]) }}
>
    {{ $slot }}
</select>