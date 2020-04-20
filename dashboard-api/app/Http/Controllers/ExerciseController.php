<?php

namespace App\Http\Controllers;

use App\Exercise;

class ExerciseController extends Controller
{
    //

    public function getExercise($id)
    {
        $exercise = Exercise::find($id);
        return view('exercises.detail', ['exercise' => $exercise]);
    }
}
