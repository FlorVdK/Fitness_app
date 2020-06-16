<?php

namespace App\Http\Controllers\Api;

use App\Exercise;
use App\Http\Controllers\Controller;

class ExerciseController extends Controller
{
    //
    public function getExercise($id)
    {
        $exercise = Exercise::find($id);
        return response()->json(['data' => $exercise], 200, [], JSON_NUMERIC_CHECK);
    }
}
