<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Regime extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'description', 'sets', 'traineeComment', 'coachComment', 'completion', 'trainee_id', 'exercises_id', 'execution_date',
    ];

    public function trainee()
    {
        return $this->hasOne('App\CoachHasTrainee', 'id', 'trainee_id');
    }

    public function exercise()
    {
        return $this->hasOne('App\Exercise', 'id', 'exercises_id');
    }
}
