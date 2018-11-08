@extends('layouts.app')

@section('content')


    <header class="container text-center">
        <h1>TODO List</h1>
    </header>

    <div class="container text-center">
        <div class="row">
            <div class="col">
                @foreach ($tasks as $task)
                <div class="task">
                <p>Name: {{ $task->name }}</p>
                <p>Due: {{ $task->due_at }}</p>
                <p>Created: {{ $task->created_at }}</p>
                <form action="/api/tasks/{{ $task ->id }}" method="post">
                {{method_field('DELETE')}}
                <button class="btn btn-danger">Delete</button>
                </form>
                </div>
                @endforeach
            </div>
            <div class="col">
                <form action="/api/tasks" method="post">
                <div class="form-group">

                <input type="text" name="name" placeholder="New Task">
                </div>
                <input type="date" name="due_at">
                <input type="submit">
                </form>
            </div>
        </div>
    </div>
