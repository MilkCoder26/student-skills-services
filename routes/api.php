<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\StudentController;
use App\Http\Controllers\Api\ServiceController;
use App\Http\Controllers\Api\CategoryController;

Route::apiResource('students', StudentController::class);
Route::apiResource('services', ServiceController::class);
Route::apiResource('categories', CategoryController::class);


Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');