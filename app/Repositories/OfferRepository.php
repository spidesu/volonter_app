<?php


namespace App\Repositories;
use App\Offer as Model;

class OfferRepository extends BaseRepository
{

    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    public function create($data) {

        if (!isset($data['vacancy_id'])) {
            return false;
        }
        $offer = $this->startConditions()
            ->create($data);

        return $offer;
    }



}
