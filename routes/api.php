<?php

use App\Http\Controllers\AircraftController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\TypeController;
use App\Http\Middleware\ConvertCamelToSnake;
use App\Http\Resources\AircraftResource;
use App\Http\Resources\ReservationResource;
use App\Models\Aircraft;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::apiResource('type', TypeController::class);
Route::apiResource('aircraft', AircraftController::class);
Route::apiResource('reservation', ReservationController::class);

//Handle Auth
Route::middleware(['web'])->group(function () {
    Route::post('/login', [LoginController::class, 'authenticate'])->name('api.login');
    Route::post('/logout', [LoginController::class, 'logout'])->name('api.logout');
});

Route::get('/token/aircraft', function (Request $request) {
    return AircraftResource::collection(Aircraft::all());
})->middleware('auth:sanctum');

Route::get('/token/reservation', function (Request $request) {
    return ReservationResource::collection(Reservation::all());
})->middleware('auth:sanctum');