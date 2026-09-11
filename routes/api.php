<?php

use App\Http\Controllers\AircraftController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TypeController;
use App\Http\Middleware\ConvertCamelToSnake;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::apiResource('type', TypeController::class)->middleware(ConvertCamelToSnake::class);
Route::apiResource('aircraft', AircraftController::class)->middleware(ConvertCamelToSnake::class);
Route::apiResource('reservation', ReservationController::class)->middleware(ConvertCamelToSnake::class);

Route::post('authenticate', [LoginController::class, 'authenticate']);
