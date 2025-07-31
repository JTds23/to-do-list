<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>MLP To-Do</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300&display=swap" rel="stylesheet">

    @vite('resources/css/app.css')
</head>

<body>
    <img src="{{ asset('images/logo.png') }}" alt="MLP To-Do" class="logo">

    <div class="page-wrapper">
        
        <form id="todo-form" action="{{ route('tasks.store') }}" method="POST">
            @csrf
            <input name="title" class="form-control" placeholder="Insert task name">
            <button class="btn btn-primary" type="submit">Add</button>

            @error('title')
                <p class="text-danger">{{ $message }}</p>
            @enderror
        </form>

        <div class="table-card">
            @if ($tasks->count())
                <table class="table mb-0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Task</th>
                            <th class="text-end"></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="{{ $task->completed ? 'done' : '' }}">
                                    {{ $task->title }}
                                </td>
                                <td class="text-end">
                                    <form class="d-inline"
                                        action="{{ route('tasks.complete', $task) }}"
                                        method="POST">
                                        @csrf @method('PATCH')
                                        <button class="btn btn-success btn-icon {{ $task->completed ? 'invisible' : '' }}">
                                            <svg viewBox="0 0 1024 1024" fill="#fff" width="18" height="18">
                                                <path d="M433.9 750.1L144.3 460.5l113.9-113.9 175.7 175.7 455.8-455.8 113.9 113.9L433.9 750.1z"/>
                                            </svg>
                                        </button>
                                    </form>
                                    <form class="d-inline"
                                        action="{{ route('tasks.destroy', $task) }}"
                                        method="POST">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-danger btn-icon {{ $task->completed ? 'invisible' : '' }}">
                                            <svg viewBox="0 0 1024 1024"
                                                width="18" height="18"
                                                fill="none"
                                                class="cross-fix"
                                                stroke="#fff" stroke-width="120"
                                                stroke-linecap="round" stroke-linejoin="round">
                                                <!-- perfectly centred cross -->
                                                <line x1="256" y1="256" x2="768" y2="768"/>
                                                <line x1="768" y1="256" x2="256" y2="768"/>
                                            </svg>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @else
                <p class="p-3 m-0">No tasks found</p>
            @endif
        </div>
    </div>

    <p class="page-footer">Copyright © 2025 All Rights Reserved.</p>
</body>

</html>
