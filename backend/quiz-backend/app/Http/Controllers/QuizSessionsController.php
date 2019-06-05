<?php

namespace App\Http\Controllers;

use App\QuizSession;
use Illuminate\Http\Request;

class QuizSessionsController extends Controller
{
    //
    public function checkQuizCode($code){
        if(QuizSession::where('quizcode', $code)->count() > 0){
            return response()->json(true);
        } else{
            return response()->json(false);
        }
    }
}
