<?php


namespace App\Repositories;

use App\Regime;
use App\Repositories\Interfaces\RegimeRepositoryInterface;
use App\User;
use Illuminate\Support\Facades\Auth;

class RegimeRepository implements RegimeRepositoryInterface
{

    public function find($id)
    {
        return Regime::find($id);
    }

    public function create($data)
    {
        $regime = new Regime;
        $regime->description = $data->description;
        $regime->sets = $data->sets;
        $coach_has_trainees_id = User::find($data->trainee_id)->traineeHasCoachHasTrainees->where('coach_id', '=', Auth::user()->id)->first()->id;
        $regime->coach_has_trainees_id = $coach_has_trainees_id;
        $regime->exercises_id = $data->exercises_id;
        $regime->coach_comment = $data->comment;
        $regime->execution_date = $data->execution_date;
        $regime->completion = 0;
        $regime->save();

        return $regime;
    }

    public function update($id, $data)
    {
        $regime = Regime::find($id);
        $regime->execution_date = $data->date;
        $regime->exercises_id = $data->exercises_id;
        $regime->sets = $data->sets;
        $regime->description = $data->description;
        $regime->coach_comment = $data->coach_comment;
        $regime->save();

        return $regime;
    }

    public function delete($id)
    {
        $regime = Regime::findOrFail($id);
        $trainee_id = $regime->regimeHasCoachHasTrainee->trainee_id;
        $regime->delete();
        return $trainee_id;
    }

    public function all($columns = ['*'])
    {
        // TODO: Implement all() method.
    }

    public function paginate($perPage, $columns = ['*'])
    {
        // TODO: Implement paginate() method.
    }

    public function findBy($field, $value)
    {
        // TODO: Implement findBy() method.
    }
}
