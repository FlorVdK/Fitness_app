<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CoachHasTraineesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('coach_has_trainees')->insert([
            'trainee_id' => 3,
            'coach_id' => rand(1,2),
        ]);
        DB::table('coach_has_trainees')->insert([
            'trainee_id' => 4,
            'coach_id' => rand(1,2),
        ]);
        DB::table('coach_has_trainees')->insert([
            'trainee_id' => 5,
            'coach_id' => rand(1,2),
        ]);
        DB::table('coach_has_trainees')->insert([
            'trainee_id' => 6,
            'coach_id' => rand(1,2),
        ]);
        DB::table('coach_has_trainees')->insert([
            'trainee_id' => 7,
            'coach_id' => rand(1,2),
        ]);
        DB::table('coach_has_trainees')->insert([
            'trainee_id' => 8,
            'coach_id' => rand(1,2),
        ]);
        DB::table('coach_has_trainees')->insert([
            'trainee_id' => 9,
            'coach_id' => rand(1,2),
        ]);
        DB::table('coach_has_trainees')->insert([
            'trainee_id' => 10,
            'coach_id' => rand(1,2),
        ]);
    }
}
