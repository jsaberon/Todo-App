<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::middleware('auth')->group(function() {
  Route::get('home', 'DashboardController@index')->name('home');

  Route::patch('mark-todo/{todo}', 'TodoDoneController@update')->name('todos.done.update');
  Route::patch('mark-task/{task}', 'TaskDoneController@update')->name('tasks.done.update');

  Route::resource('projects', 'ProjectsController');
  Route::resource('{project:slug}/todos', 'TodosController');
  Route::resource('{project:slug}/{todo}/tasks', 'TasksController');

  Route::prefix('exports')->namespace('Exports')->group(function() {
    Route::get('project-reports', 'ProjectReportsController@export')->name('exports.project-reports');
  });
});
