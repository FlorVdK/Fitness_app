<?php


namespace App\Repositories\Interfaces;


interface BaseInterface
{
    public function create($data);

    public function update($id, $data);

    public function delete($id);

    public function all($columns = ['*']);

    public function paginate($perPage, $columns = ['*']);

    public function find($id);

    public function findBy($field, $value);
}
