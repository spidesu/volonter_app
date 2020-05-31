<?php


namespace App\Repositories\Providers\Vacancy\Eloquent;


use App\Entities\Vacancy;
use App\Repositories\Providers\BaseRepositories;
use App\Repositories\Providers\Vacancy\VacancyRepository;
use Illuminate\Database\Eloquent\Model;

class EloquentVacancyRepository extends BaseRepositories implements VacancyRepository
{
    /**
     * @var $model Vacancy
    */
    protected $model;

    public function __construct(Vacancy $model)
    {
        parent::__construct($model);
    }


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

        $vacancy = $this->model->create($data);

        return $vacancy;
    }
}
