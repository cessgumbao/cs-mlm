<?php

namespace App\Repositories;

use App\Repositories\Interfaces\RepositoryInterface;

class Repository implements RepositoryInterface
{
    protected $model;

    public function setModel($model)
    {
        $this->model = $model;
    }

    public function all($columns = array('*'))
    {
        return $this->model->get($columns);
    }

    public function create(array $data)
    {
        return $this->model->create($data);
    }

    public function update(array $data, $id, $attribute="id")
    {
        return $this->model->where($attribute, '=', $id)->update($data);
    }

    public function delete($id, $attribute="id")
    {
        return $this->model->where($attribute, '=', $id)->delete();
    }

    public function show($id)
    {
        return $this->model->findOrFail($id);
    }
}