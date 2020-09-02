@extends('layouts.app')

@section('content')
  <x-header :title="$project->name . ' / Todos'">
    @include('todos.partials.create-modal')
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
        <x-tables.header>Tasks Done</x-tables.header>
        <x-tables.header>Action</x-tables.header>
      </tr>
    </thead>
    
    <tbody>
      @foreach ($todos as $todo)
        <tr>
          <x-tables.data>{{ $todo->description }}</x-tables.data>
          <x-tables.data>{{ $todo->difficulty }}</x-tables.data>
          <x-tables.data>{{ $todo->requested_by ?? 'No One' }}</x-tables.data>
          <x-tables.data>{{ $todo->done ? $todo->done->format('M d, Y') : 'On Going...' }}</x-tables.data>
          <x-tables.data>{{ $todo->deadline ? $todo->deadline->format('M d, Y') : 'No Deadline' }}</x-tables.data>
          <x-tables.data>{{ $todo->deadline ? $todo->deadline->diffForHumans() : 'No Deadline' }}</x-tables.data>
          <x-tables.data>{{ checkDone($project->tasks, 'done') }}</x-tables.data>
          <x-tables.data class="flex justify-between">
            <x-buttons.form-submit
              :name="$todo->done ? 'Done' : 'Mark Done'"
              method="PATCH"
              :action="route('todos.done.update', $todo->id)"
              :disabled="!$todo->tasks->whereNotNull('done')->count() == $todo->tasks->count() || $todo->done"
            />
            <x-anchor :link="route('tasks.index', [$project->slug, $todo->id])" name="View Tasks" />
          </x-tables.data>
        </tr>
      @endforeach
    </tbody>
  </x-tables.responsive>
@endsection