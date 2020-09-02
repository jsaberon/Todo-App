@extends('layouts.app')

@section('content')

<style>
.tooltip .tooltip-text {
  visibility: hidden;
  text-align: center;
  padding: 2px 6px;
  position: absolute;
  z-index: 100;
}
.tooltip:hover .tooltip-text {
  visibility: visible;
}
</style>

<h1>{{ date('Y') }}</h1>

<div class="flex bg-gray-500 p-1 rounded shadow">
  @foreach ($groupDatas as $data)
    <div class="m-2">
      <h1 class="block">{{ date('M', strtotime($data[0]['done'])) }}</h1>

      <div class="flex">
        @foreach (innerGroup($data) as $item)
          <div class="tooltip m-1 h-3 w-3 bg-green-{{ checkContribution($item) }}">
            <span class='tooltip-text text-sm bg-blue-200 p-5 -mt-1 lg:-mt-8 rounded'>{{ $item->count() . ' finish job on ' . date('M d, Y', strtotime($item[0]['done'])) }}</span>
          </div>
        @endforeach
      </div>
    </div>
  @endforeach
</div>
@endsection
