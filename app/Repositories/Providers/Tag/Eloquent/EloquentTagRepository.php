<?php


namespace App\Repositories\Providers\Tag\Eloquent;


use App\Entities\Vacancy;
use App\Repositories\Providers\BaseRepositories;
use App\Repositories\Providers\Tag\TagRepository;

class EloquentTagRepository extends BaseRepositories implements TagRepository
{
    /**
     * @var $model Vacancy
    */
    protected $model;

}
