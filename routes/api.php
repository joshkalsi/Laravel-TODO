<?php

use App\Task;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('tasks', function() {
   return Task::all();
});

Route::post('tasks', function(Request $request) {
    return Task::create($request->all);
});
Route::get('tasks/{task_id}', function($task_id) {
   return Task::find($task_id);
});

