@extends('layouts.master')

@section('nav')
    <nav class="navbar navbar-expand ">
        <div class="container">
            <a class="navbar-brand text-center" href="{{ route('task.index') }}">< All Tasks</a>
        </div>
    </nav>
@stop

@section('content')
    <div class="container text-center p-2">
        <br>
        <br>
        <h2>{{ $task->name }}</h2>
        <br>
        <h3>Due {{ $task->due_at->format('d/m/Y') }}</h3>
        <br>
        @if ($task->completed) <h3 class="text-success">Complete</h3>
        @elseif ($task->due_at->isPast()) <h3 class="text-danger">Overdue</h3>
        @endif
        <br>
        <a class="btn btn-light btn-outline-dark btn-lg btn-block" href="{{ route('task.edit', [$task]) }}">Edit</a>
        <br>
        <form action="{{route('task.destroy', [$task]) }}" method="post">
            @method('delete')
            <button class="btn btn-danger btn-lg btn-block">Delete</button>
        </form>
    </div>
@stop
