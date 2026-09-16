<?php

use App\Http\Controllers\LoginController;
use Illuminate\Support\Facades\Route;

//Dashboard
Route::get('/', function () {
    return view('welcome');
});

//Secret page to test auth
Route::get('/secret', function () {
    return view('secret');
})
->name('secret')
->middleware(['auth']);

//Login page
Route::get('/login', function () {
    return view('login');
})
->name('web.login');