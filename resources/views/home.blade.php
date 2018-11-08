<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TODO</title>
</head>
<body>

    <h1>TODO List</h1>

    <form action="/api/tasks" method="post" onsubmit="return false">
        <input type="text" name="name" placeholder="New Task">
        <input type="date" name="due_at">
        <input type="submit">
    </form>

    @foreach ($tasks as $task)
        <div class="task">
            <p>Name: {{ $task->name }}</p>
            <p>Due: {{ $task->due_at }}</p>
            <p>Created: {{ $task->created_at }}</p>
        </div>
    @endforeach

</body>
</html>