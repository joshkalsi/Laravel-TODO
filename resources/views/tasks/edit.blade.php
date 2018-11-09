@extends('layouts.master')

@section('nav')
    <nav class="navbar navbar-expand ">
            <a class="navbar-brand" href="{{ route('task.index') }}"><< All Tasks</a>
        <a href="{{ route('task.show', [$task]) }}" class="navbar-brand">< Back to Task</a>
    </nav>
@stop

@section('content')
    <div class="container">
        <br>
        <form action="{{ route('task.update', [$task]) }}" method="post">
            @csrf
            @method('put')
            <div class="form-group">
                <label class="lb-lg" for="name">Edit Task</label>
                <input name="name" type="text" class="form-control form-control-lg" placeholder="{{ $task->name }}" required>
            </div>
            <div class="form-group">
                <label class="lb-lg" for="name">Edit Due Date</label>
                <input type="date" name="due_at" class="form-control form-control-lg" placeholder="{{ $task->due_at->format('Y-m-d') }}" required>
            </div>
                <button type="submit" class="btn btn-light btn-outline-dark btn-block">Save</button>
        </form>
    </div>
@stop