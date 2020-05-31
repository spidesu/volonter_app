<?php


namespace App\Repositories\Providers\Vacancy\Eloquent;


use App\Entities\Vacancy;
use App\Repositories\Providers\BaseRepositories;
use App\Repositories\Providers\Vacancy\VacancyRepository;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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

    public function getUserVacancy($user_id)
    {
        $vacancies = $this->model->with('offers')->where('user_id', $user_id)->get();

        return $vacancies;
    }

    public function getVacancyByCity($city)
    {
        $vacancies = $this->model->with('offers')->where('city','like', $city)->get();

        return $vacancies;
    }

    public function create(Request $request) {
        $data = $request->all();
        $data['user_id'] = Auth::id();
        $vacancy = $this->model::create($data);

        return $vacancy;
    }
}
