<?php

use Illuminate\Support\Facades\Route;
use TaskApp\TaskController;

Route::view('tasks', 'Task::tasks.index')->name('tasks.index');
Route::view('tasks/create', 'Task::task.create')->name('tasks.create');
Route::post('tasks', [TaskController::class, 'store'])->name('task.store');
Route::get('tasks/{task}/edit', [TaskController::class, 'edit'])->name('task.edit');
//Route::get('api/tasks/{task}/edit', [TaskController::class, 'edit'])->name('task.edit.api');
Route::put('tasks/{task}', [TaskController::class, 'update'])->name('task.update');
Route::delete('tasks/{task}', [TaskController::class, 'delete'])->name('task.delete');
