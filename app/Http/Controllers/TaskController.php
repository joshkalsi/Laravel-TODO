<?php


namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function getTasks() {
        return Task::all();
    }

    public function getTaskById($id) {
        return Task::find($id);
    }

    public function addTask(Request $request) {
        Task::create($request->all());
    }
}
