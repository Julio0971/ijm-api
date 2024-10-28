<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\SubjectController;

use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    // Auth
    Route::get('/check', [AuthController::class, 'check']);

    // Subjects
    Route::apiResource('subjects', SubjectController::class)->only(['index', 'store']);
});