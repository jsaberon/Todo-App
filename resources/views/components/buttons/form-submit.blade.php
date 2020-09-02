@props([
  'name' => '',
  'method' => 'POST',
  'action' => '',
  'disabled' => false,
])

<form
  action="{{ $action }}"
  method="{{ $method === 'GET' ? 'GET' : 'POST' }}"
>
  @csrf

  @if (! in_array($method, ['GET', 'POST']))
    @method($method)
  @endif

  <button
    class="p-2 rounded shadow text-xs {{ $disabled ? 'bg-gray-500 text-gray-900' : 'bg-green-700 text-white' }}"
    {{ $disabled ? 'disabled' : '' }}
  >
    {{ $name }}
  </button>
</form>