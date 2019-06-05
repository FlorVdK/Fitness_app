<?php

use Illuminate\Database\Seeder;
use App\Answer;

class AnswerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        Answer::truncate();

        //question 1
        Answer::create([
            'answer' => 'Int',
            'correct' => 0,
            'question_id' => '1',
        ]);

        Answer::create([
            'answer' => 'Double',
            'correct' => 1,
            'question_id' => '1',
        ]);

        //question 2
        Answer::create([
            'answer' => 'Start up point',
            'correct' => 0,
            'question_id' => '2',
        ]);

        Answer::create([
            'answer' => 'Booting',
            'correct' => 1,
            'question_id' => '2',
        ]);

        Answer::create([
            'answer' => 'Connecting',
            'correct' => 0,
            'question_id' => '2',
        ]);

        Answer::create([
            'answer' => 'Resetting',
            'correct' => 0,
            'question_id' => '2',
        ]);

        //question 3
        Answer::create([
            'answer' => '16',
            'correct' => 0,
            'question_id' => '3',
        ]);

        Answer::create([
            'answer' => '8',
            'correct' => 1,
            'question_id' => '3',
        ]);

        Answer::create([
            'answer' => '24',
            'correct' => 0,
            'question_id' => '3',
        ]);

        Answer::create([
            'answer' => '12 ',
            'correct' => 0,
            'question_id' => '3',
        ]);

        Answer::create([
            'answer' => '54',
            'correct' => 0,
            'question_id' => '3',
        ]);

        //question 4
        Answer::create([
            'answer' => 'Intranet service provider',
            'correct' => 0,
            'question_id' => '4',
        ]);

        Answer::create([
            'answer' => 'Internet service provider',
            'correct' => 1,
            'question_id' => '4',
        ]);

        Answer::create([
            'answer' => 'Intranet service producer',
            'correct' => 0,
            'question_id' => '4',
        ]);

        //question 5

        Answer::create([
            'answer' => 'CTRL + w',
            'correct' => 1,
            'question_id' => '5',
        ]);
    }
}
