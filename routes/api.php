<?php
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
Route::prefix('tasks')->group(function() {

    Route::post('', 'TaskController@addTask')->name('task.create');

    Route::delete('{task}', 'TaskController@deleteTask')->name('task.destroy');

    Route::patch('{task}', 'TaskController@toggleTaskCompleted')->name('task.toggle');

    Route::put('{task}', 'TaskController@update')->name('task.update');
});

