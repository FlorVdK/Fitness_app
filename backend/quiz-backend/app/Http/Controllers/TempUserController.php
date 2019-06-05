<?php

namespace App\Http\Controllers;

use App\QuizSession;
use App\TempUser;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TempUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        $quizcode = $request->quizcode;
        $quiz_sessions_id = QuizSession::where('quizcode', $quizcode)->first();

        $tempUser = new TempUser;

        $tempUser->nickname = $request->nickname;
        $tempUser->api_token = Str::random(20);
        $tempUser->quiz_sessions_id = $quiz_sessions_id->id;

        $tempUser->save();

        return response()->json(['data' => $tempUser->toArray()], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\TempUser  $tempUser
     * @return \Illuminate\Http\Response
     */
    public function show(TempUser $tempUser)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\TempUser  $tempUser
     * @return \Illuminate\Http\Response
     */
    public function edit(TempUser $tempUser)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\TempUser  $tempUser
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TempUser $tempUser)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\TempUser  $tempUser
     * @return \Illuminate\Http\Response
     */
    public function destroy(TempUser $tempUser)
    {
        //
    }
}
