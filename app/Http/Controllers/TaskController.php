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
        return redirect('/');
    }

    public function deleteTask($id) {
        Task::find($id)->delete();
        return redirect('/');
    }

    public function toggleTaskCompleted($id) {
        $task =Task::find($id);

        if ($task->completed) {
            $task->completed = false;
            $task->save();
        } else {
            $task->completed = true;
            $task->save();
        }
        return redirect('/');
    }
}
