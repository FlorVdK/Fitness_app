<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ExercisesTableSeeder extends Seeder
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
            'description' => file_get_contents('http://loripsum.net/api/10/short'),
            'src_image' => Str::random(10),
            'src_video' => Str::random(10),
        ]);
        DB::table('exercises')->insert([
            'name' => "Sit-Ups",
            'description' => file_get_contents('http://loripsum.net/api/10/short'),
            'src_image' => Str::random(10),
            'src_video' => Str::random(10),
        ]);
        DB::table('exercises')->insert([
            'name' => "Squats",
            'description' => file_get_contents('http://loripsum.net/api/10/short'),
            'src_image' => Str::random(10),
            'src_video' => Str::random(10),
        ]);
        DB::table('exercises')->insert([
            'name' => "Crunches",
            'description' => file_get_contents('http://loripsum.net/api/10/short'),
            'src_image' => Str::random(10),
            'src_video' => Str::random(10),
        ]);
        DB::table('exercises')->insert([
            'name' => "Plank",
            'description' => file_get_contents('http://loripsum.net/api/10/short'),
            'src_image' => Str::random(10),
            'src_video' => Str::random(10),
        ]);
    }
}
