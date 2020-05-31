<?php


namespace App\Repositories;
use Illuminate\Database\Eloquent\Model;


abstract class BaseRepository
{
    /**
     * @var Model
     */
    protected $model;


    /**
     * BaseRepository constructor.
     */
    public function __construct()
    {
        $this->model = app($this->getModelClass());
    }

    /**
     * У каждого репозитория должен быть метод getModelClass, чтобы понимать, с какой моделью мы работаем
     * @return string
     */
    abstract protected function getModelClass();

    /**
     *
     * @return Model
     */
    protected function startConditions()
    {
        return clone $this->model;
    }
    public function find($id)
    {
        return $this->model->find($id);
    }
}
