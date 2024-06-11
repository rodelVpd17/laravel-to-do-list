<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/main.css">
    <title>Home</title>
</head>
<body>
    <div class="to-do-container">
        <h2>To Do Task</h2>
        <form action="/addNewTask" method="POST">
            @csrf
            <input type="text" name="task" placeholder="Add new task">
            <button>Add</button> 
        </form>
        <div>
            <h3 style="text-align: center">Not done</h3>
            <ul>
                @foreach ($tasks as $task)
                    @if (!$task->done)
                        <li class="to-do-display">
                            <span>{{$task['task']}}</span>
                            <div style="display: flex">
                                <button><a href="/editTask/{{$task->id}}">Edit</a></button>
                                <form action="/deleteTask/{{$task->id}}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button>Delete</button>
                                </form>
                                <form action="/doneTask/{{$task->id}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button>Done</button>
                                </form>
                            </div>
                        </li>
                    @endif
                @endforeach
            </ul>
        </div>
        <div>
            <h3 style="text-align: center">Done</h3>
                <ul>
                    @foreach ($tasks as $task)
                    @if ($task->done)
                        <li class="to-do-display">
                            <span>{{$task['task']}}</span>
                            <div style="display: flex">
                                <form action="/notDoneTask/{{$task->id}}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <button>Not Done</button>
                                </form>
                            </div>
                        </li>
                    @endif
                    @endforeach
                </ul>
        </div>
    </div>
</body>
</html>