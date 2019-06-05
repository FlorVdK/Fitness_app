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
            'type' => 'multiple_2',
        ]);

        Question::create([
            'question' => 'The process of starting or restarting a computer is called: ',
            'type' => 'multiple_4',
        ]);

        Question::create([
            'question' => 'How many bits in a byte?',
            'type' => 'multiple_5',
        ]);

        Question::create([
            'question' => 'ISP stands for...',
            'type' => 'multiple_3',
        ]);

        Question::create([
            'question' => 'Shortcut key for undo is...',
            'type' => 'fast',
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
