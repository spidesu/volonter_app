<?php


namespace App\Repositories;
use App\Repositories\Providers\Vacancy\VacancyRepository;
use App\Review as Model;

class ReviewRepository extends BaseRepository
{
    public $vacancyRepository;
    public function __construct(VacancyRepository $vacancyRepository)
    {
        parent::__construct();
        $this->vacancyRepository = $vacancyRepository;
    }
    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    public function create($data) {

        if (!isset($data['offer_id'])) {
            return false;
        }
        $review = $this->startConditions()
            ->create($data);

        return $review;
    }

    public function show($id) {
        $review = $this->startConditions()->where('id', $id)->first;

    }

    public function getReviewByVacancyId($vacancy_id)
    {
        $review = $this->startConditions()->where('vacancy_id', $vacancy_id)->first();
        return $review;
    }

    public function averageRatingByUserId($user_id)
    {
        $average_rating = $this->startConditions()
            ->with('vacancy')
            ->where('vacancy.offers.user_id', $user_id)
            ->where('vacancy.offers.result', true)
            ->where('vacancy.status', 2)
            ->pluck('rating')
            ->avg();

        return $average_rating;

    }



}
