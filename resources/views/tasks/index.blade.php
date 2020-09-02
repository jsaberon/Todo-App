@extends('layouts.app')

@section('content')
  <x-header :title="$project->name . ' / ' . $todo->description . ' / Tasks'">
    @include('tasks.partials.create-modal')
  </x-header>

  <x-tables.responsive>
    <thead>
      <tr>
        <x-tables.header>Description</x-tables.header>
        <x-tables.header>Difficulty</x-tables.header>
        <x-tables.header>Requested By</x-tables.header>
        <x-tables.header>Status</x-tables.header>
        <x-tables.header>Deadline Date</x-tables.header>
        <x-tables.header>Deadline Remaining Time</x-tables.header>
        <x-tables.header>Action</x-tables.header>
      </tr>
    </thead>

    <tbody>
      @foreach ($tasks as $task)
        <tr>
          <x-tables.data>{{ $task->description }}</x-tables.data>
          <x-tables.data>{{ $task->difficulty }}</x-tables.data>
          <x-tables.data>{{ $task->requested_by ?? 'No One' }}</x-tables.data>
          <x-tables.data>{{ $task->done ? 'done (' . $task->done->format('M d, Y') .')' : 'On Going...' }}</x-tables.data>
          <x-tables.data>{{ $task->deadline ? $task->deadline->format('M d, Y') : 'No Deadline' }}</x-tables.data>
          <x-tables.data>{{ $task->deadline ? $task->deadline->diffForHumans() : 'No Deadline' }}</x-tables.data>
          <x-tables.data class="flex justify-between">
            <x-buttons.form-submit
              :name="$task->done ? 'Done' : 'Mark Done'"
              method="PATCH"
              :action="route('tasks.done.update', $task->id)"
              :disabled="$task->done"
            />
          </x-tables.data>
        </tr>
      @endforeach
    </tbody>
  </x-tables.responsive>
@endsection