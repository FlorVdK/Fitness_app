<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Model;
use App\Regime;
use Faker\Generator as Faker;

$factory->define(Regime::class, function (Faker $faker) {

    $array = ["goed", " ", "slecht", " ", "valt mee", " "];

    return [
        //
        'description' => file_get_contents('http://loripsum.net/api/10/short'),
        'sets' => rand(1, 25) * 5,
        'coach_comment' => $array[array_rand($array)],
        'trainee_comment' => $array[array_rand($array)],
        'completion' => rand(0, 100),
        'coach_has_trainees_id' => rand(1, 8),
        'exercises_id' => rand(1, 5),
        'execution_date' => '2020-06-' . rand(2, 29),
    ];
});
