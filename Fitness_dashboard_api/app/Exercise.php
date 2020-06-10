<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'exercise_name', 'description', 'src_image', 'src_video',
    ];
}
