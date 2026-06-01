<?php

use App\Http\Controllers\Auth\AuthController;
use Illuminate\Support\Facades\Route;

#api/v1/auth/
Route::post('register', [AuthController::class, 'register']);
Route::post('login', [AuthController::class, 'login']);
Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
