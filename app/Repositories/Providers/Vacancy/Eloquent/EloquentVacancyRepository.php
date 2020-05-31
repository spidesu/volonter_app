<?php


namespace App\Repositories\Providers\Vacancy\Eloquent;


use App\Entities\Vacancy;
use App\Repositories\Providers\BaseRepositories;
use App\Repositories\Providers\Vacancy\VacancyRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

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

    public function create(Request $request) {

        $vacancy = $this->model->create($request->all());

        return $vacancy;
    }
}
