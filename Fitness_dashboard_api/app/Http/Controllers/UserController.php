<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    //
    public function index()
    {
        $trainees = Auth::user()->trainees;
        return view('users.index', ['trainees' => $trainees]);
    }

    public function getTrainee($id)
    {
        $trainee = User::find($id);
        return view('users.detail', ['trainee' => $trainee]);
    }

    public function makeAddTrainee()
    {
        $trainees = User::role('trainee')->get();
        return view('users.addTrainee', ['trainees' => $trainees]);
    }

    public function addTrainee($id)
    {
        Auth::user()->trainees()->attach($id);
        return redirect('/coach/dashboard');
    }
}
