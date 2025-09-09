<?php

use App\Http\Controllers\Api\AppointmentController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\Api\DoctorsController;
use App\Http\Controllers\Api\PatientsController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth:sanctum'])->group(function () {
    Route::apiResource('patients',  PatientsController::class);
    Route::apiResource('doctors',  DoctorsController::class);
    Route::apiResource('appointments',  AppointmentController::class);
});

Route::post('/login', [AuthController::class, 'login'])
    ->middleware('guest')
    ->name('login');

    



