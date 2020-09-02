@extends('layouts.app')

@section('content')
<x-header title="Projects">
  @include('projects.partials.create-modal')
</x-header>

<x-tables.responsive>
  <thead>
    <tr>
      <x-tables.header>Project Name</x-tables.header>
      <x-tables.header>Todos Done</x-tables.header>
      <x-tables.header>Tasks Done</x-tables.header>
      <x-tables.header>Deadline Date</x-tables.header>
      <x-tables.header>Deadline Remaining Time</x-tables.header>
      <x-tables.header>Action</x-tables.header>
    </tr>
  </thead>
  <tbody>
    @foreach ($projects as $project)
      <tr>
        <x-tables.data>{{ $project->name }}</x-tables.data>
        <x-tables.data>{{ checkDone($project->todos, 'done') }}</x-tables.data>
        <x-tables.data>{{ checkDone($project->tasks, 'done') }}</x-tables.data>
        <x-tables.data>{{ $project->deadline ? $project->deadline->format('M d, Y') : 'No Deadline' }}</x-tables.data>
        <x-tables.data>{{ $project->deadline ? $project->deadline->diffForHumans() : 'No Deadline' }}</x-tables.data>
        <x-tables.data>
          <x-anchor :link="route('exports.project-reports', 'project_id=' . $project->id)" target="_blank" name="Download Reports" />
          <x-anchor :link="route('todos.index', $project->slug)" name="View Todos" />
        </x-tables.data>
      </tr>
    @endforeach
  </tbody>
</x-tables.responsive>
@endsection