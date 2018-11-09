@extends('layouts.master')

@section('add-task')
    <div class="container">
        <form action="{{ route('task.create') }}" method="post">
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

@section('content')
    <div class="container p-3">
        <ul class="list-group">
            @foreach ($tasks as $task)
                <div class="list-group-item">
                    <div class="row align-items-center">
                        <div class="col-9">
                            <a href="{{ route('task.show', [$task]) }}">
                                <h3 class="@if ($task->completed) text-success @elseif ($task->due_at->isPast()) text-danger @endif">{{ $task->name }}</h3>
                            </a>
                        </div>
                        <div class="col text-center">
                            <p class="@if ($task->completed) text-success @elseif ($task->due_at->isPast()) text-danger @endif">Due {{$task->due_at->format('d/m/Y') }}</p>
                            <div class="row">
                                <div class="col">
                                    <form action="{{ route('task.toggle', [$task]) }}" method="post">
                                        @method('patch')
                                        <button type="submit" class="btn btn-success">Completed</button>
                                    </form>
                                </div>
                                <div class="col">
                                    <form action="{{route('task.destroy', [$task]) }}" method="post">
                                        @method('delete')
                                        <button class="btn btn-danger">Delete</button>
                                    </form>
                                </div>

                            </div>

                        </div>
                    </div>

                </div>
            @endforeach
        </ul>
    </div>
@stop

