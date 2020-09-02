@props([
  'link' => '',
  'target' => '',
  'name' => ''
])

<a 
  class="text-xs p-2 shadow border border-blue-600 bg-blue-500 text-white rounded"
  href="{{ $link }}"
  {{ $target ? 'target="_blank"' : '' }}
>
  {{ $name }}
</a>