<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit</title>
</head>
<body>
    <div class="to-do-container">
        <h2>Edit task</h2>
        <form action="/editTask/{{$task->id}}" method="POST">
            @csrf
            @method('PUT')
            <input type="text" name="task" value="{{$task->task}}" placeholder="Add new task">
            <button>Update</button> 
        </form>
    </div>
</body>
</html>