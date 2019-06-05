<?php

namespace App\Http\Controllers;

use App\Events\NewQuestion;
use App\Question;
use App\Quiz;
use App\QuizSession;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $quizzes = Quiz::All();

        return view('quiz.index', compact('quizzes'));
    }

    public function getCode($id)
    {
        $quizCode = Str::random(5);
        $quiz = Quiz::find($id);
        $question = $quiz->questions->first;

        $quizSession = QuizSession::firstOrCreate([
            'quizcode' => $quizCode,
            'question_id' => $question->question->id,
            'quiz_id' => $quiz->id,
        ]);

        return view('quiz.getCode', compact('quiz', 'quizCode'));

    }

    public function start(Request $request)
    {
        $quizCode =$request->quizCode;
        $quizId = $request->quizId;

        $quiz = Quiz::find($quizId);

        $question_id = $quiz->questions->first->id->id;
        $answers = Question::find($question_id)->answers;
        $question = $quiz->questions->first;

        $request->session()->put('quizCode', $quizCode);
        $request->session()->put('quizId', $quizId);

        $quizSession = QuizSession::where('quizcode', $quizCode)->first();

        event(new NewQuestion($quizSession));

        return view('quiz.question', compact('quizCode', 'quiz', 'question', 'answers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show(Quiz $quiz)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit(Quiz $quiz)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Quiz $quiz)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy(Quiz $quiz)
    {
        //
    }
}
