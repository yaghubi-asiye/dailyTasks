<?php

use Illuminate\Support\Facades\Route;

$ns = 'App\Http\Controllers\Auth\\';
Route::get('login', $ns.'LoginController@showLoginForm')->name('login');
Route::post('login', $ns.'LoginController@login');

Route::post('logout', $ns.'LoginController@logout')->name('logout');

Route::get('register', $ns.'RegisterController@showRegistrationForm')->name('register');
Route::post('register', $ns.'RegisterController@register');

