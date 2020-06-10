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
}
