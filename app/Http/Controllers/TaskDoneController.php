<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskDoneController extends Controller
{
    public function update(Request $request, Task $task) {
      $task->update(['done' => now()]);

      return back()->with(['message' => $task->description . ' Task Marked Done.']);
    }
}
