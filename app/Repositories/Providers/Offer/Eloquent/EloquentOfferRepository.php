<?php


namespace App\Repositories\Providers\Offer\Eloquent;


use App\Entities\Vacancy;
use App\Repositories\Providers\BaseRepositories;
use App\Repositories\Providers\Offer\OfferRepository;

class EloquentOfferRepository extends BaseRepositories implements OfferRepository
{
    /**
     * @var $model Vacancy
    */
    protected $model;

}
