<?php

namespace App\Http\Controllers;

use App\Project;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
      $projects = Project::with(['todos', 'tasks'])->get();

      $datas = [];
      $shade = 0;

      foreach($projects as $project) {
        $datas = array_merge($datas, $project->tasks->toArray());
        $datas = array_merge($datas, $project->todos->toArray());
      }

      $groupDatas = collect($datas)->filter(function($value) {
        return date('Y', strtotime($value['done'])) === date('Y');
      })->groupBy(function($data) {
        return Carbon::parse($data['done'])->format('Y-m');
      })->sort();
      
      return view('home', compact('groupDatas'));
    }
}
