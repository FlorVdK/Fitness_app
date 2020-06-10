<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CoachHasTrainee extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'coach_id', 'trainee_id',
    ];

    public function coach()
    {
        return $this->hasOne('App\User', 'id', 'coach_id');
    }

    public function trainee()
    {
        return $this->hasOne('App\User', 'id', 'trainee_id');
    }

    public function regimes()
    {
        return $this->hasMany('App\Regime', 'coach_has_trainees_id', 'id');
    }
}
