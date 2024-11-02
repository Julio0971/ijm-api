<?php

namespace App\Http\Controllers;

use App\Models\Question;

class QuestionController extends Controller
{
    public function show ($question_name) {
        $question = Question::where('name', $question_name)->first();
        
        return response()->json(compact('question'), 200);
    }
}