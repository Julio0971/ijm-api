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
            'subject_id' => ['required', 'integer', 'exists:subjects,id'],
            'question_id' => ['required', 'integer', 'exists:questions,id'],
        ]);
        
        DB::transaction(function () use ($data) {
            Answer::updateOrInsert(
                [
                    'subject_id' => $data['subject_id'],
                    'question_id' => $data['question_id']
                ],
                [
                    'answer' => $data['answer'],
                    'seconds' => $data['seconds'],
                    'in_time' => $data['in_time'],
                    'created_at' => now(),
                    'updated_at' => now()
                ]
            );
        });

        return response()->json([
            'message' => 'Datos guardados correctamente'
        ], 200);
    }
}