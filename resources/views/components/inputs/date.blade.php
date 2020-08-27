@props([
  'name' => '',
  'label' => '',
  'minDate' => '',
  'maxDate' => '',
  'required' => false,
])

<div class="m-2">
  <label
    class="py-1 text-xs text-gray-600 block"
    for="{{ $name }}"
  >
    {{ $label }} 

    @if ($required)
      <small class="text-red-600 text-xs">*</small>
    @endif
  </label>
  <input
    class="p-2 rounded bg-gray-200 focus:bg-white border-transparent focus:border-green-400 w-full"
    type="date"
    name="{{ $name }}"
    id="{{ $name }}"
    min="{{ $minDate }}"
    max="{{ $maxDate }}"
  >
</div>