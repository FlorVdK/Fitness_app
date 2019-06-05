<?php

use Illuminate\Database\Seeder;
use App\Quiz;

class QuizTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Quiz::truncate();

        Quiz::create([
            'name' => 'Basic IT quiz',
            'category_id' => 1,
        ]);

        Quiz::create([
            'name' => 'Basic Animal quiz',
            'category_id' => 4,
        ]);
    }
}
