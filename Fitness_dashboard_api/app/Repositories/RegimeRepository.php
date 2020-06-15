<?php


namespace App\Repositories;

use App\Regime;
use App\Repositories\Interfaces\RegimeRepositoryInterface;
use App\User;
use DateTime;
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

    public function setUpFullRegime($data)
    {

        $difficulty = $data->difficulty;

        $exercises = $data->exercises;
        $nrExercises = count($exercises);
        $nrExercisesDay = $nrExercises - 1;
        if ($nrExercisesDay == 0) $nrExercisesDay = 1;

        $nr = 0;

        $startDate = new DateTime($data->start_date);

        for ($i = 0; $i < 30; $i++) {
            if ($i % 5 != 0) {
                echo "<br/>";
                for ($j = 0; $j < $nrExercisesDay; $j++) {
                    $this->createRegime($startDate, $exercises[$nr], 10 + (4 * ($difficulty + 1) * floor(sqrt($i + 1))), $data->trainee_id);
                    $nr++;
                    if ($nr == $nrExercises) $nr = 0;
                }
            }
            $startDate->modify('+1 day');
        }
        return $data->trainee_id;
    }

    public function createRegime($date, $exercises_id, $sets, $trainee_id)
    {
        $regime = new Regime;
        $regime->description = null;
        $regime->sets = $sets;
        $coach_has_trainees_id = User::find($trainee_id)->traineeHasCoachHasTrainees->where('coach_id', '=', Auth::user()->id)->first()->id;
        $regime->coach_has_trainees_id = $coach_has_trainees_id;
        $regime->exercises_id = $exercises_id;
        $regime->coach_comment = null;
        $regime->execution_date = $date->format('Y-m-d');
        $regime->completion = 0;
        $regime->save();

        return $regime;
    }
}
