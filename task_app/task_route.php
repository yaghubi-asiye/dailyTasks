<?php

use Illuminate\Support\Facades\Route;
use TaskApp\TaskController;

Route::view('tasks', 'Task::tasks.index')->name('tasks.index');
Route::view('tasks/create', 'Task::tasks.create')->name('tasks.create');
Route::post('tasks', [TaskController::class, 'store'])->name('tasks.store');
Route::get('tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit');
//Route::get('api/tasks/{task}/edit', [TaskController::class, 'edit'])->name('tasks.edit.api');
Route::put('tasks/{task}', [TaskController::class, 'update'])->name('tasks.update');
Route::delete('tasks/{task}', [TaskController::class, 'delete'])->name('tasks.delete');
