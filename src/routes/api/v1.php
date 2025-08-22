<?php

use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\PatientsController;
use Illuminate\Support\Facades\Route;

Route::apiResource('patients',  PatientsController::class);
Route::apiResource('doctors',  DoctorsController::class);
