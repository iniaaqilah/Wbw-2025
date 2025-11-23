<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\TrainingController; 

Route::get('/', function () {
    return view('welcome');
});

Route::resource('departements', DepartementController::class);
Route::resource('attendances', AttendanceController::class);
Route::resource('positions', PositionController::class);
Route::resource('employees', EmployeeController::class);
Route::resource('trainings', TrainingController::class); 
