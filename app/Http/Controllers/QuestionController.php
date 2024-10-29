<?php

namespace App\Http\Controllers;

use App\Models\Question;
use App\Models\Subject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function getSubjectQuestion () {
        $subject = Subject::where('user_id', Auth::id())->first();

        if ($subject->id % 3 == 0) {
            $question_name = 'Variante 3 (neutro)';
        } else if ($subject->id % 2 == 0) {
            $question_name = 'Variante 2 (mujer)';
        } else {
            $question_name = 'Variante 1 (hombre)';
        }

        $question = Question::where('name', $question_name)->firstOrFail();

        return response()->json(compact('question'), 200);
    }
}