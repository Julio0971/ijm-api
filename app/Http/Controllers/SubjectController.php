<?php

namespace App\Http\Controllers;

use App\Models\Subject;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index () {
        return Subject::paginate(10);
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

        $data['user_id'] = Auth::id();

        Subject::create($data);

        return response()->json([
            'message' => 'Datos guardados correctamente'
        ], 200);
    }
}