<?php

namespace App\Http\Controllers;

use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ProjectsController extends Controller
{
    public function index() {
      $projects = Project::with(['todos', 'tasks'])->where('user_id', auth()->id())->get();

      return view('projects.index', compact('projects'));
    }

    public function store(Request $request) {
      $this->validator($request);

      $slug = Str::slug($request->name, '-');

      Project::create([
        'user_id' => auth()->id(),
        'slug' => $slug,
        'name' => $request->name,
        'deadline' => $request->deadline,
      ]);

      return back()->with(['message' => $request->name . ' Successfully Created.']);
    }

    public function update(Request $request, Project $project) {
      $this->validator($request);

      $project->update([
        'name' => $request->name,
        'deadline' => $request->deadline,
      ]);

      return back()->with(['message' => $project->name . ' Successfully Updated.']);
    }

    protected function validator($request) {
      return $request->validate([
        'name' => 'required|unique:projects',
        'deadline' => 'nullable',
      ]);
    }
}
