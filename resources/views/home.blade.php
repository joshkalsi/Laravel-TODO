@extends('layouts.master')

@section('add-task')
    <div class="container">
        <form action="/api/tasks" method="post">
            <div class="form-group row">
                <label class="col col-form-label text-center" for="task-name">Task</label>
                <div class="col-6">
                    <input class="form-control text-center" type="text" name="name" id="task-name" placeholder="New Task" required>
                </div>
                <label class="col col-form-label text-center" for="due_at">Date Due</label>
                <div class="col">
                    <input class="form-control text-center" type="date" name="due_at" id="due_at" required>
                </div>
            </div>
            <div class="col text-center">
                <input class="btn btn-primary" type="submit" value="Add Task">
            </div>
        </form>
    </div>
@stop

@section('task-list')
    <div class="container p-3">
        <ul class="list-group">
            @foreach ($tasks as $task)
                <div class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col-8">
                            <h3 class={{ "" . $task->due_at->isPast() ? "text-danger" : ""}}>{{ $task->name }}</h3>
                        </div>
                        <div class="col text-center">
                            <p class={{ $task->due_at->isPast() ? "text-danger" : ""}}>Due {{ \Carbon\Carbon::parse($task->due_at)->format('d/m/Y') }}</p>
                            <form action="/api/tasks/{{ $task ->id }}" method="post">
                                {{method_field('DELETE')}}
                                <button class="btn btn-danger">Delete</button>
                            </form>
                        </div>
                    </div>

                </div>
            @endforeach
        </ul>
    </div>
@stop

