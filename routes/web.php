<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

//Dashboard
Route::get('/', function () {
    return view('welcome');
})
->middleware(['auth'])
->name('web.dashboard');

//Login page
Route::get('/login', function () {
    return view('login');
})
->name('web.login');