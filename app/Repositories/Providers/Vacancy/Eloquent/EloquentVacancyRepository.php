<?php


namespace App\Repositories\Providers\Vacancy\Eloquent;


use App\Entities\Vacancy;
use App\Repositories\Providers\BaseRepositories;
use App\Repositories\Providers\Vacancy\VacancyRepository;

class EloquentVacancyRepository extends BaseRepositories implements VacancyRepository
{
    /**
     * @var $model Vacancy
    */
    protected $model;

}
