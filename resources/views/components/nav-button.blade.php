@props([
    'href' => '#',
    'color' => 'blue'
])

<a href="{{ $href }}"
   class="inline-flex items-center px-4 py-2 rounded-lg font-semibold shadow-md text-white
          {{ $color === 'blue' ? 'bg-blue-600 hover:bg-blue-500' : '' }}
          {{ $color === 'green' ? 'bg-green-600 hover:bg-green-500' : '' }}
          {{ $color === 'purple' ? 'bg-purple-600 hover:bg-purple-500' : '' }}
          {{ $color === 'orange' ? 'bg-orange-600 hover:bg-orange-500' : '' }}
          transition">
    {{ $slot }}
</a>
