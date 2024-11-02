<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\QuestionController;

use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function () {
    // Auth
    Route::get('/check', [AuthController::class, 'check']);

    // Subjects
    Route::apiResource('subjects', SubjectController::class)->only(['index', 'store']);

    // Questions
    Route::get('/questions/{question_name}', [QuestionController::class, 'show']);
    
    // Users
    Route::put('/users/update-step', [UserController::class, 'updateStep']);

    // Answers
    Route::apiResource('answers', AnswerController::class)->only(['index', 'store']);
});