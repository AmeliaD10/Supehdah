<?php

use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\ClinicInfoController;
use App\Http\Controllers\API\UserController;

Route::post('/login', [AuthController::class, 'login']);

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/logout', [AuthController::class, 'logout']);
});
Route::get('/user', [AuthController::class, 'user']);

Route::get('/clinics', [ClinicInfoController::class, 'index']);

Route::middleware('auth:sanctum')->put('/user', [UserController::class, 'update']);

Route::middleware('auth:sanctum')->put('/update-profile', [AuthController::class, 'updateProfile']);

