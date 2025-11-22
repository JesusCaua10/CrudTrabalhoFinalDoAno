<div {{ $attributes->merge([
    'class' => 'bg-gray-900 border border-gray-700 sm:rounded-lg shadow-md p-6 transition'
]) }}>
    {{ $slot }}
</div>
