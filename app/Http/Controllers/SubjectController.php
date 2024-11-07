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
        $paginate = $request->query('per_page');

        if ($request->query('per_page') == 0) {
            $paginate = 10;
        } else if ($request->query('per_page') == -1) {
            $paginate = Subject::count();
        }

        return Subject::with(['question', 'answers.question'])->paginate($paginate);
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
            $question_name = '';
            $next_subject_id = Subject::count() + 1;

            if (($next_subject_id - 1) % 3 == 0) {
                $question_name = 'Variante 1 (hombre)';
            } else if (($next_subject_id - 2) % 3 == 0) {
                $question_name = 'Variante 2 (mujer)';
            } else if (($next_subject_id - 3) % 3 == 0) {
                $question_name = 'Variante 3 (neutro)';
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