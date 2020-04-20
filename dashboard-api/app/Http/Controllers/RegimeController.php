<?php

namespace App\Http\Controllers;

use App\Exercise;
use App\Regime;
use App\Repositories\Interfaces\RegimeRepositoryInterface;
use App\User;
use Illuminate\Http\Request;

class RegimeController extends Controller
{
    private $regimeRepository;

    public function __construct(RegimeRepositoryInterface $regimeRepository)
    {
        $this->regimeRepository = $regimeRepository;
    }

    //TODO https://itnext.io/repository-design-pattern-done-right-in-laravel-d177b5fa75d4
    public function makeNewRegime($id)
    {
        $exercises = Exercise::all();
        $trainee = User::find($id);

        return view('regimes.create', ['exercises' => $exercises, 'trainee' => $trainee]);
    }

    public function createRegime(Request $request)
    {
        $regime = $this->regimeRepository->create($request);
    }

    public function editRegime(Request $request)
    {
        $regime = Regime::find($request->id);
        $regime->description = $request->description;
        $regime->sets = $request->sets;
        $regime->trainee_id = $request->trainee_id;
        $regime->exercice_id = $request->exercice_id;
        $regime->execution_date = $request->execution_date;
        $regime->completion = $request->completion;
        $regime->save();
    }

    public function deleteRegime($id)
    {
        $regime = $this->regimeRepository->delete($id);
    }

    public function addExerciseToRegime(Request $request)
    {

    }

    public function getRegime($id)
    {
        $regime = $this->regimeRepository->find($id);
        return view('regimes.detail', ['regime' => $regime]);
    }

    public function getRegimeEdit($id)
    {
        $regime = $this->regimeRepository->find($id);
        $exercises = Exercise::all();
        return view('regimes.edit', ['regime' => $regime, 'exercises' => $exercises]);
    }

    public function regimeEdit(Request $request)
    {
        $regime = $this->regimeRepository->find($request->id);
        $regime->execution_date = $request->date;
        $regime->exercises_id = $request->exercises_id;
        $regime->sets = $request->sets;
        $regime->description = $request->description;
        $regime->coach_comment = $request->coach_comment;
        $regime->save();
        return view('regimes.detail', ['regime' => $regime]);
    }
}
