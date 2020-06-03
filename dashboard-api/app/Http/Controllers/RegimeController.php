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

    public function getEditRegime($id)
    {
        $regime = $this->regimeRepository->find($id);
        $exercises = Exercise::all();
        return view('regimes.edit', ['regime' => $regime, 'exercises' => $exercises]);
    }

    public function editRegime(Request $request)
    {
        $regime = $this->regimeRepository->update($request->id, $request);
        return view('regimes.detail', ['regime' => $regime]);
    }
}
