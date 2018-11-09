<?php


namespace App\Http\Controllers;

use App\Http\Requests\TaskUpdateRequest;
use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{

    public function index() {
        $tasks = Task::all();
        return view('tasks.index', [
            'tasks' => $tasks
        ]);
    }

    public function show(Task $task) {
        return view('tasks.show', [
            'task' => $task,
        ]);
    }

    public function addTask(Request $request) {
        Task::create($request->all());
        return redirect('/');
    }

    public function deleteTask(Task $task) {
        $task->delete();
        return redirect('/');
    }

    public function toggleTaskCompleted(Task $task) {

        if ($task->completed) {
            $task->completed = false;
            $task->save();
        } else {
            $task->completed = true;
            $task->save();
        }
        return redirect('/');
    }

    public function edit(Task $task) {
        return view('tasks.edit', [
            'task' => $task,
        ]);
    }

    public function update(TaskUpdateRequest $request, Task $task) {
        info($request->all());
        $task->update([
            'name' => $request->input('name'),
            'due_at' => $request->input('due_at'),
        ]);
//        $task->name = $request->input('name');
//        $task->due_at = $request->input('due_at');
//        $task->save();
        return back();
    }
}
