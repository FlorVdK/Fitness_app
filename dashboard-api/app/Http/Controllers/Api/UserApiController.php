<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;

class UserApiController extends Controller
{
    //(
    public function getUsers(){
        $users = User::get();

        return response()->json(['data' => $users], 200, [], JSON_NUMERIC_CHECK);

    }
}
