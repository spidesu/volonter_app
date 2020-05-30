<?php


namespace App\Repositories\Providers;


use Illuminate\Database\Eloquent\Model;

abstract class BaseRepositories
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function find(int $id)
    {
        return $this->model->find($id);
    }

    public function all()
    {
        return $this->model->all();
    }

}
