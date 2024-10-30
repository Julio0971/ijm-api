<?php

namespace App\Http\Controllers;

use App\Models\Answer;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AnswerController extends Controller
{
    public function store (Request $request) {
        $data = $request->validate([
            'answer' => ['required', 'string'],
            'seconds' => ['required', 'integer'],
            'in_time' => ['required', 'boolean'],
            'question_id' => ['required', 'integer', 'exists:questions,id'],
        ]);

        
        DB::transaction(function () use ($data, $request) {
            $user = $request->user();

            Answer::create([
                'answer' => $data['answer'],
                'seconds' => $data['seconds'],
                'in_time' => $data['in_time'],
                'subject_id' => $user->subject->id,
                'question_id' => $data['question_id']
            ]);

            $user->step = 'thank-you';
            $user->save();
        });

        return response()->json([
            'message' => 'Datos guardados correctamente'
        ], 200);
    }
}