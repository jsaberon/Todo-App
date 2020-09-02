<table>
  <thead>
    <tr>
      <th>{{ $project->name }}</th>
    </tr>
  </thead>
  <tbody>
    @if ($project->todos->count())
      <tr></tr>
      <tr>
        <th></th>
        <th><b>TODOS:</b></th>
      </tr>
      <tr>
        <th></th>
        <th><b>Todo-Description:</b></th>
        <th><b>Todo-Difficulty:</b></th>
        <th><b>Todo-Requested-By:</b></th>
        <th><b>Todo-Status:</b></th>
        <th><b>Todo-Deadline:</b></th>
        <th><b>Todo-Start-Date:</b></th>
      </tr>
      @foreach ($project->todos as $todo)
      <tr>
        <td></td>
        <td>{{ $todo->description }}</td>
        <td>{{ $todo->difficulty }}</td>
        <td>{{ $todo->requested_by }}</td>
        <td>{{ $todo->done ? 'done' . $todo->done->format('M d, Y') : 'On Going...' }}</td>
        <td>{{ $todo->deadline->format('M d, Y') }}</td>
        <td>{{ $todo->created_at->format('M d, Y') }}</td>
      </tr>

        @if ($todo->tasks->count())
          <tr></tr>
          <tr>
            <th></th>
            <th></th>
            <th></th>
            <th><b>TASKS:</b></th>
          </tr>
          <tr>
            <th></th>
            <th></th>
            <th><b>Tasks-Description:</b></th>
            <th><b>Tasks-Difficulty:</b></th>
            <th><b>Tasks-Requested-By:</b></th>
            <th><b>Tasks-Status:</b></th>
            <th><b>Tasks-Deadline:</b></th>
            <th><b>Tasks-Start-Date:</b></th>
          </tr>

          @foreach ($todo->tasks as $task)
            <tr>
              <td></td>
              <td></td>
              <td>{{ $task->description }}</td>
              <td>{{ $task->difficulty }}</td>
              <td>{{ $task->requested_by }}</td>
              <td>{{ $task->done ? 'done' . $task->done->format('M d, Y') : 'On Going...' }}</td>
              <td>{{ $task->deadline->format('M d, Y') }}</td>
              <td>{{ $task->created_at->format('M d, Y') }}</td>
            </tr>
          @endforeach
          <tr></tr>
        @endif
      @endforeach
    @endif
  </tbody>
</table>