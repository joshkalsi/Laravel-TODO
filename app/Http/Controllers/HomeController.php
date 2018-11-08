<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $tasks = app('App\Http\Controllers\TaskController')->getTasks();

        return view('home', [
            'tasks' => $tasks
        ]);
    }
}
