<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\PatientsController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {

    Route::get('/', [DashboardController::class, 'index']);

    Route::group(['prefix' => '/patients'], function () {
        Route::get('/', [PatientsController::class, 'index'])
        ->name('patients.index');
        Route::post('/', [PatientsController::class, 'store'])
        ->name('patients.store');
        Route::get('/add', [PatientsController::class, 'create'])
        ->name('patients.create');
        Route::get('/{patient}', [PatientsController::class, 'show'])
        ->name('patients.show');
        Route::put('/{patient}', [PatientsController::class, 'update'])
        ->name('patients.update');
        Route::delete('/{patient}', [PatientsController::class, 'destroy'])
        ->name('patients.delete');
    });

    Route::group(['prefix' => '/doctors'], function () {
        Route::get('/add', [DoctorsController::class, 'create'])
        ->name('doctors.create');
        Route::get('/', [DoctorsController::class, 'index'])
        ->name('doctors.index');
        Route::post('/', [DoctorsController::class, 'store'])
        ->name('doctors.store');
        Route::get('/{doctor}', [DoctorsController::class, 'show'])
        ->name('doctors.show');
        Route::put('/{doctor}', [DoctorsController::class, 'update'])
        ->name('doctors.update');
        Route::delete('/{doctor}', [DoctorsController::class, 'destroy'])
        ->name('doctors.delete');
    });
 
    Route::group(['prefix' => '/appointments'], function () {
        Route::get('/add', [AppointmentController::class, 'create'])
        ->name('appointments.create');
        Route::get('/', [AppointmentController::class, 'index'])
        ->name('appointments.index');
        Route::post('/', [AppointmentController::class, 'store'])
        ->name('appointments.store');
        Route::get('/{appointment}', [AppointmentController::class, 'show'])
        ->name('appointments.show');
        Route::put('/{appointment}', [AppointmentController::class, 'update'])
        ->name('appointments.update');
        Route::delete('/{appointment}', [AppointmentController::class, 'destroy'])
        ->name('appointments.delete');
    });
    
});

Route::get('/login', [AuthController::class, 'login'])
->name('login');

require __DIR__.'/auth.php';
