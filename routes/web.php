<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::middleware('auth')->group(function() {
  Route::resource('projects', 'ProjectsController');
  Route::resource('{project:slug}/todos', 'TodosController');
});