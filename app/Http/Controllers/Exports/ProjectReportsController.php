<?php

namespace App\Http\Controllers\Exports;

use App\Exports\ProjectReportExport;
use App\Http\Controllers\Controller;
use App\Project;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ProjectReportsController extends Controller
{
    public function export(Request $request) {
      $project = Project::with(['todos.tasks'])->find($request->project_id);

      return Excel::download(new ProjectReportExport($project), auth()->user()->name . '_' . $project->slug . '.xlsx');
    }
}
