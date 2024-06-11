<?php

use App\Models\Task;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\taskController;

Route::get('/', function () {
    $tasks = Task::all();

    return view('home', ['tasks' => $tasks]);
});

Route::post('/addNewTask', [TaskController::class, 'addTask']);
Route::get('/editTask/{task}', [TaskController::class, 'populateTask']);
Route::put('/editTask/{task}', [TaskController::class, 'updateTask']);
Route::delete('/deleteTask/{task}', [TaskController::class, 'deleteTask']);
Route::put('/doneTask/{task}', [TaskController::class, 'doneTask']);
Route::put('/notDoneTask/{task}', [TaskController::class, 'notDoneTask']);