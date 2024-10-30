<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function updateStep (Request $request) {
        $user = $request->user();
        $user->step = $request->step;
        $user->save();

        return response()->json([
            'message' => 'Datos guardados correctamente'
        ], 200);
    }
}