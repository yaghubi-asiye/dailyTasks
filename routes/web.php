<?php

use Illuminate\Support\Facades\Route;

//TDD Test Driven Development
Route::get('/', function () {
    return view('welcome');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
