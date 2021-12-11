<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\EmployeeDataController;
use App\Http\Controllers\Api\EmployeeController;

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/employees/countries', [EmployeeDataController::class, 'countries']);
Route::get('/employees/{country}/states', [EmployeeDataController::class, 'states']);
Route::get('/employees/departments', [EmployeeDataController::class, 'departments']);
Route::get('/employees/{state}/cities', [EmployeeDataController::class, 'cities']);

Route::get('/employees', [EmployeeController::class, 'store']);