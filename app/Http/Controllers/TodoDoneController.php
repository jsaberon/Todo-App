<?php

namespace App\Http\Controllers;

use App\Todo;
use Illuminate\Http\Request;

class TodoDoneController extends Controller
{
    public function update(Request $request, Todo $todo) {
      $todo->update(['done' => now()]);

      return back()->with(['message' => $todo->description . ' Todo Marked Done.']);
    }
}
