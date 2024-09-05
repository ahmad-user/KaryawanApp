<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\api\AuthController;
use App\Http\Controllers\Api\EmployeeController;



Route::middleware('auth:sanctum')->group(function () {

//employee
Route::get('employee/search', [EmployeeController::class, 'search']);
Route::get('employee', [EmployeeController::class, 'index']);
Route::post('employee', [EmployeeController::class, 'store']);
Route::get('employee/{id}', [EmployeeController::class, 'show']);
Route::get('employee/{id}/edit', [EmployeeController::class, 'edit']);
Route::put('employee/{id}/update', [EmployeeController::class, 'update']);
Route::delete('employee/{id}/delete', [EmployeeController::class, 'delete']);
Route::get('/reports/employees', [EmployeeController::class, 'employeeReport']);

//user
Route::get('user', [AuthController::class, 'index']);
Route::get('user/search', [AuthController::class, 'search']);
Route::get('user/{id}/edit', [AuthController::class, 'show']);
Route::post('user/{id}/update', [AuthController::class, 'update']);
Route::delete('user/{id}/delete', [AuthController::class, 'delete']);
});
Route::post('login', [AuthController::class, 'login']);
Route::post('register', [AuthController::class, 'register']);

