<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function notDoneTask(Task $task, Request $request){
        $incomingFields = $request->validate([
            'done'
        ]);

        $incomingFields['done'] = 0;

        $task->update($incomingFields);

        return redirect('/');
    }


    public function doneTask(Task $task, Request $request){
        $incomingFields = $request->validate([
            'done'
        ]);

        $incomingFields['done'] = 1;

        $task->update($incomingFields);

        return redirect('/');
    }

    public function updateTask(Task $task, Request $request){
        $incomingFields = $request->validate([
            'task' => ['required', 'max:20'],
        ]);

        $task->update($incomingFields);

        return redirect('/');
    }

    public function populateTask(Task $task){
        return view('edit', ['task' => $task]);
    }

    public function deleteTask(Task $task){
        $task->delete();

        return redirect('/');
    }

    public function addTask(Request $request) {

        $incomingFields = $request->validate([
            'task' => ['required', 'max:20'],
            'done'
        ]);

        $incomingFields['done'] = 0;

        Task::create($incomingFields);

        return redirect('/');
    }
}
