<?php

namespace App\Http\Controllers;

use App\Difficulty;
use App\Project;
use App\Todo;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    public function index(Project $project) {
      $todos = Todo::where('project_id', $project->id)->get();

      $difficulties = Difficulty::all();

      return view('todos.index', compact('todos', 'difficulties', 'project'));
    }

    public function store(Request $request, Project $project) {
      $this->validator($request);

      $todo = $project->todos()->create([
        'description' => $request->description,
        'difficulty' => $request->difficulty,
        'requested_by' => $request->requested_by,
        'deadline' => $request->deadline,
      ]);

      return back()->with(['message' => $todo->description . ' Successfully Created']);
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
