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

    public function regime()
    {
        return $this->hasOne('App\Regime', 'trainee_id', 'trainee_id');
    }
}
