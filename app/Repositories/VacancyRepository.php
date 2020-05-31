<?php


namespace App\Repositories;


use App\Entities\Vacancy as Model;

class VacancyRepository extends BaseRepository
{
    /**
     * @var $model Vacancy
     */
    protected $model;


    public function getVacancies()
    {
        $vacancies = $this->model->all();

        return $vacancies;
    }

    public function getVacancy($id)
    {
        $vacancy = $this->model->with('offers')->find($id);

        return $vacancy;
    }

    public function create($data) {

        $vacancy = $this->model
            ->create($data);

        return $vacancy;
    }

    protected function getModelClass()
    {
        return Model::class;
    }
}
