<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function check (Request $request) {
        $user = $request->user();

        return response()->json(compact(('user')), 200);
    }
}