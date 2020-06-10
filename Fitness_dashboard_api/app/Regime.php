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
        'description', 'sets', 'traineeComment', 'coachComment', 'completion', 'coach_has_trainees_id', 'exercises_id', 'execution_date',
    ];

    public function exercise()
    {
        return $this->hasOne('App\Exercise', 'id', 'exercises_id');
    }

    public function regimeHasCoachHasTrainee()
    {
        return $this->hasOne('App\CoachHasTrainee', 'id', 'coach_has_trainees_id');
    }
}
