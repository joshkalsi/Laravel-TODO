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
Route::prefix('tasks')->group(function() {

    Route::get('', 'TaskController@getTasks');

    Route::post('', 'TaskController@addTask');

    Route::get('{id}', ['uses' => 'TaskController@getTaskById']);

    Route::delete('{id}', ['uses' => 'TaskController@deleteTask']);

});


