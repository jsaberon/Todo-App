<?php

function checkDone($data, $field) {
  $count = $data->whereNotNull($field)->count();
  $total = $data->count();

  return $count . ' / ' . $total;
}

function checkContribution($item) {
  $data = $item->count() * 100;

  if($data >= 900) {
    $data = 900;
  }

  return $data;
}

function innerGroup($item) {
  $item = $item->groupBy(function($item) {
    return Carbon\Carbon::parse($item['done'])->format('d');
  })->sort();

  return $item;
}