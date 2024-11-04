<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\QuestionController;

use Illuminate\Support\Facades\Route;

// Store subject
Route::post('/subjects', [SubjectController::class, 'store']);

// Store answer
Route::post('/answers', [AnswerController::class, 'store']);

// Questions
Route::get('/questions/{question_name}', [QuestionController::class, 'show']);

Route::middleware('auth:sanctum')->group(function () {
    // Auth
    Route::get('/check', [AuthController::class, 'check']);

    // Get subjects
    Route::get('/subjects', [SubjectController::class, 'index']);
});