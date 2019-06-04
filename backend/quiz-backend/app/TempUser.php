<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempUser extends Model
{
    public function quizSession()
    {
        return $this->hasOne('App\QuizSession');
    }

    //
    protected $fillable = ['nickname', 'api_token', 'quiz_sessions_id'];
}
