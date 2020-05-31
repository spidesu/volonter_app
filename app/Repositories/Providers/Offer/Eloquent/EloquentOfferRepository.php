<?php


namespace App\Repositories\Providers\Offer\Eloquent;


use App\Repositories\Providers\BaseRepositories;
use App\Repositories\Providers\Offer\OfferRepository;
use App\Entities\Offer;
use Illuminate\Http\Request;

class EloquentOfferRepository extends BaseRepositories implements OfferRepository
{
    /**
     * @var $model Offer
    */
    protected $model;


    public function __construct(Offer $model)
    {
        parent::__construct($model);
    }

    public function getOffers()
    {
        $offers = $this->model->all();

        return $offers;
    }

    public function getOffer($id)
    {
        $offer = $this->model->find($id);

        return $offer;
    }

    public function create(Request $request) {
        $offer = $this->model::create($request->all());

        return $offer;
    }

    public function getUserOfferHistory($user_id)
    {
        $offers = $this->model
            ->where('result', 1)
            ->where('users_id', $user_id)
            ->with(['vacancy' => function($q) {
        $q->where('status','=',2);
            }])
            ->get();
        return $offers;
    }

}
