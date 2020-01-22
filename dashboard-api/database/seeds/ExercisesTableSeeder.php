<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
            'exercise_name' => Str::random(10),
            'description' => file_get_contents('http://loripsum.net/api/10/short'),
            'src_image' => Str::random(10),
            'src_video' => Str::random(10),
        ]);
        DB::table('exercises')->insert([
            'exercise_name' => Str::random(10),
            'description' => file_get_contents('http://loripsum.net/api/10/short'),
            'src_image' => Str::random(10),
            'src_video' => Str::random(10),
        ]);
        DB::table('exercises')->insert([
            'exercise_name' => Str::random(10),
            'description' => file_get_contents('http://loripsum.net/api/10/short'),
            'src_image' => Str::random(10),
            'src_video' => Str::random(10),
        ]);
        DB::table('exercises')->insert([
            'exercise_name' => Str::random(10),
            'description' => file_get_contents('http://loripsum.net/api/10/short'),
            'src_image' => Str::random(10),
            'src_video' => Str::random(10),
        ]);
        DB::table('exercises')->insert([
            'exercise_name' => Str::random(10),
            'description' => file_get_contents('http://loripsum.net/api/10/short'),
            'src_image' => Str::random(10),
            'src_video' => Str::random(10),
        ]);
    }
}
