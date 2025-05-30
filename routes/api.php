<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\CategoryController;
use App\Http\Controllers\Api\AuthController;

Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
    Route::get('/user', [AuthController::class, 'user']);
});

Route::apiResource('students', StudentController::class);
Route::apiResource('services', ServiceController::class);
Route::apiResource('categories', CategoryController::class);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');