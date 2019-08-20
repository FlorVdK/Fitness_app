<?php

use Illuminate\Database\Seeder;
use \App\Question;
use \App\QuizHasQuestions;

class QuestionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        //
        Question::truncate();

        Question::create([
            'question' => 'What is a bigger? An int or a double?',
            'option_a' => 'Int',
            'option_b' => 'Double',
            'answer' => 'b',
            'type' => 'multiple_2',
        ]);

        Question::create([
            'question' => 'The process of starting or restarting a computer is called: ',
            'option_a' => 'Start up point',
            'option_b' => 'Booting',
            'option_c' => 'Connecting',
            'option_d' => 'Resetting',
            'answer' => 'b',
            'type' => 'multiple_4',
        ]);

        Question::create([
            'question' => 'How many bits in a byte?',
            'option_a' => '16',
            'option_b' => '8',
            'option_c' => '24',
            'option_d' => '12',
            'answer' => 'b',
            'type' => 'multiple_5',
        ]);

        Question::create([
            'question' => 'ISP stands for...',
            'option_a' => 'Intranet service provider',
            'option_b' => 'Internet service provider',
            'option_c' => 'Intranet service producer',
            'answer' => 'b',
            'type' => 'multiple_3',
        ]);

        QuizHasQuestions::create([
            'quiz_id' => '1',
            'question_id' => '1',
        ]);

        QuizHasQuestions::create([
            'quiz_id' => '1',
            'question_id' => '2',
        ]);

        QuizHasQuestions::create([
            'quiz_id' => '1',
            'question_id' => '3',
        ]);

        QuizHasQuestions::create([
            'quiz_id' => '1',
            'question_id' => '4',
        ]);

        QuizHasQuestions::create([
            'quiz_id' => '1',
            'question_id' => '5',
        ]);
    }
}
