<?php

use App\Http\Controllers\PatientsController;
use Illuminate\Support\Facades\Route;

Route::apiResource('patients',  PatientsController::class)->only('index');
