<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Regime;
use Illuminate\Support\Facades\Auth;

class RegimeController extends Controller
{
    //
    public function index()
    {
        $trainee = Auth::user();

        $regimes = [];
        foreach ($trainee->traineeHasCoachHasTrainees as $item) {
            foreach ($item->regimes as $regime) {
                $exercise_name = $regime->exercise->name;
                $regime = $regime->toArray();
                $regime['exercise_name'] = $exercise_name;
                array_push($regimes, $regime);
            }
        }

        return response()->json(['data' => $regimes], 200, [], JSON_NUMERIC_CHECK);
    }

    public function getRegime($id)
    {
        $regime = Regime::find($id);
        $exercise_name = $regime->exercise->name;

        return response()->json(['data' => $regime], 200, [], JSON_NUMERIC_CHECK);
    }
}
