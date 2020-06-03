<?php


namespace App\Repositories;

use App\Regime;
use App\Repositories\Interfaces\RegimeRepositoryInterface;

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
        $regime->trainee_id = $data->trainee_id;
        $regime->exercice_id = $data->exercice_id;
        $regime->coachComment = $data->coachComment;
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
        // TODO: Implement delete() method.
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
