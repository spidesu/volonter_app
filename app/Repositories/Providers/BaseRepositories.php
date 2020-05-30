<?php


namespace App\Repositories\Providers;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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

    public function create(Request $request)
    {
        return $this->model->create($request->all());
    }

}
