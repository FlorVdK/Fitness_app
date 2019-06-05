<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class QuizSession extends Model
{
    //
    protected $fillable = ['quizcode', 'question_id', 'quiz_id'];
}
