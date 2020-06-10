<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use Notifiable, HasApiTokens, HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function trainees()
    {
        return $this->belongsToMany('App\User', 'coach_has_trainees', 'coach_id', 'trainee_id');
    }

    public function coaches()
    {
        return $this->belongsToMany('App\User', 'coach_has_trainees', 'trainee_id', 'coach_id');
    }

    public function traineeHasCoachHasTrainees()
    {
        return $this->hasMany('App\CoachHasTrainee', 'trainee_id', 'id');
    }
}
