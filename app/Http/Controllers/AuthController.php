<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function check (Request $request) {
        $user = User::with('subject.question')->where('id', $request->user()->id)->first();

        return response()->json(compact(('user')), 200);
    }
}