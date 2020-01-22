<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Regime;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

$factory->define(Regime::class, function (Faker $faker) {
    return [
        //
            'description' => file_get_contents('http://loripsum.net/api/10/short'),
            'sets' => rand(5, 120),
            'coachComment' => Str::random(10),
            'traineeComment' => Str::random(10),
            'completion' => rand(0,100),
            'trainee_id' => rand(1,8),
            'exercises_id' => rand(1,5),
            'execution_date' => '2020-01-'.rand(19,29),
    ];
});
