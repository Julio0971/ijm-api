<?php

namespace App\Http\Controllers;

use App\Models\Subject;
use App\Models\Question;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index (Request $request) {
        return Subject::with(['question.answer', 'answers.question'])->paginate($request->query('per_page') ?: 10);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store (Request $request) {
        $data = $request->validate([
            'gender' => ['required', 'string', 'in:Hombre,Mujer,Prefiero no contestar'],
            'age' => ['required', 'integer'],
            'speciality' => ['required', 'string'],
            'grade' => ['required', 'integer'],
            'participated_before' => ['required', 'boolean'],
        ]);

        $response = DB::transaction(function () use ($data) {
            $question_name = 'Variante 1 (hombre)';
            $latest_subject = Subject::latest()->first();

            if ($latest_subject && $latest_subject->id % 3 == 0) {
                $question_name = 'Variante 3 (neutro)';
            } else if ($latest_subject && $latest_subject->id % 2 == 0) {
                $question_name = 'Variante 2 (mujer)';
            }

            $data['question_id'] = Question::where('name', $question_name)->value('id');

            $subject = Subject::create($data);

            return [
                $subject->id,
                $question_name
            ];
        });

        return response()->json([
            'message' => 'Datos guardados correctamente',
            'subject_id' => $response[0],
            'question_name' => $response[1],
        ], 200);
    }
}