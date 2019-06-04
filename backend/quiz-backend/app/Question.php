<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    //
    protected $fillable = ['question', 'type'];
    
    public function answers()
    {
        return $this->hasMany('App\Answer');
    }

    public function quizzes()
    {
        return $this->belongsToMany('App\Quiz');
    }
}
