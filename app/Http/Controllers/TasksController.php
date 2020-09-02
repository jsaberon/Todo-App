<?php

namespace App\Http\Controllers;

use App\Difficulty;
use App\Project;
use App\Task;
use App\Todo;
use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function index(Project $project, Todo $todo) {
      $tasks = Task::where('todo_id', $todo->id)->get();

      $difficulties = Difficulty::all();

      return view('tasks.index', compact('tasks', 'project', 'todo', 'difficulties'));
    }

    public function store(Request $request, Project $project, Todo $todo) {
      $this->validator($request);

      $tasks = $todo->tasks()->create([
        'description' => $request->description,
        'difficulty' => $request->difficulty,
        'requested_by' => $request->requested_by,
        'deadline' => $request->deadline,
      ]);

      if(! is_null($todo->done)) {
        $todo->update(['done' => null]);
      }

      return back()->with(['message' => $tasks->description . ' Successfully Created']);
    }

    protected function validator($request) {
      return $request->validate([
        'description' => 'required',
        'difficulty' => 'required',
        'requested_by' => 'nullable',
        'deadline' => 'nullable',
      ]);
    }
}
