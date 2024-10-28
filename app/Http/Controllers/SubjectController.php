<?php

namespace App\Http\Controllers;

use App\Models\Subject;

use Illuminate\Http\Request;

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
        Subject::create(
            $request->validate([
                'gender' => ['nullable', 'present'],
                'age' => ['required', 'integer'],
                'speciality' => ['required', 'string'],
                'grade' => ['required', 'integer'],
                'participated_before' => ['required', 'boolean'],
            ])
        );

        return response()->json([
            'message' => 'Datos guardados correctamente'
        ], 200);
    }
}