<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/secret', function () {
    return view('secret');
})->middleware(['auth', 'web'])->name('secret');

Route::get('/login', function () {
    return view('login');
})->middleware(['web'])
->name('web.login');