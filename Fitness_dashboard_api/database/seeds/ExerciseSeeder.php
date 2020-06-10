<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ExerciseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('exercises')->insert([
            'name' => "Push-ups",
            'description' => 'doe een push-up',
            'src_image' => Str::random(10),
            'src_video' => Str::random(10),
        ]);
        DB::table('exercises')->insert([
            'name' => "Sit-Ups",
            'description' => 'doe een Sit-up',
            'src_image' => Str::random(10),
            'src_video' => Str::random(10),
        ]);
        DB::table('exercises')->insert([
            'name' => "Squats",
            'description' => 'doe een squat',
            'src_image' => Str::random(10),
            'src_video' => Str::random(10),
        ]);
        DB::table('exercises')->insert([
            'name' => "Crunches",
            'description' => 'doe een crunch',
            'src_image' => Str::random(10),
            'src_video' => Str::random(10),
        ]);
        DB::table('exercises')->insert([
            'name' => "Plank",
            'description' => 'doe plank',
            'src_image' => Str::random(10),
            'src_video' => Str::random(10),
        ]);
    }
}
