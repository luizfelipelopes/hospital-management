<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\PatientsController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index', ['name' => 'John Doe']);
});

Route::get('/patients', [PatientsController::class, 'index'])
->name('patients.index');

Route::post('/patients', [PatientsController::class, 'store'])
->name('patients.store');

Route::get('/patients/add', [PatientsController::class, 'create'])
->name('patients.create');

Route::get('/patients/{patient}', [PatientsController::class, 'show'])
->name('patients.show');

Route::put('/patients/{patient}', [PatientsController::class, 'update'])
->name('patients.update');

Route::delete('/patients/{patient}', [PatientsController::class, 'destroy'])
->name('patients.delete');


Route::get('/doctors/add', [DoctorsController::class, 'create'])
->name('doctors.create');

Route::get('/doctors', [DoctorsController::class, 'index'])
->name('doctors.index');

Route::post('/doctors', [DoctorsController::class, 'store'])
->name('doctors.store');

Route::get('/doctors/{doctor}', [DoctorsController::class, 'show'])
->name('doctors.show');

Route::put('/doctors/{doctor}', [DoctorsController::class, 'update'])
->name('doctors.update');

Route::delete('/doctors/{doctor}', [DoctorsController::class, 'destroy'])
->name('doctors.delete');




Route::get('/login', [AuthController::class, 'login'])
->name('login');


require __DIR__.'/auth.php';
