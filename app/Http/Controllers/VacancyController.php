<?php

namespace App\Http\Controllers;

use App\Entities\Offer;
use App\Entities\Tag;
use App\Http\Controllers\Swagger\VacancySwagger;
use App\Http\Requests\VacancyRequest;
use App\Entities\Vacancy;
use App\Http\Requests\VacancyTouchTag;
use App\Repositories\Providers\Vacancy\Eloquent\EloquentVacancyRepository;
use App\Transformers\Vacancies\VacanciesTransformer;
use App\Transformers\Vacancies\VacanciesWithOffersTransformer;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VacancyController extends Controller
{
    use VacancySwagger;

    protected $vacancyRepository;

    public function __construct(EloquentVacancyRepository $vacancyRepository, Request $request)
    {
        $this->vacancyRepository = $vacancyRepository;
    }

    /**
     * Display a listing of the resource.
     *
     * @return JsonResource
     */
    public function index()
    {
        return VacanciesTransformer::collection($this->vacancyRepository->all());
    }

    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return JsonResource
     */
    public function indexCity(Request $request)
    {
        $vacancies = $this->vacancyRepository->getVacancyByCity($request->city);
        return VacanciesTransformer::collection($vacancies);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  VacancyRequest  $request
     * @return JsonResource
     */
    public function store(VacancyRequest $request)
    {
        $vacancy = $this->vacancyRepository->create($request);
        return new VacanciesTransformer($vacancy);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return JsonResource
     */
    public function show($id)
    {
        $vacancy = $this->vacancyRepository->getVacancy($id);
        return new VacanciesTransformer($vacancy);
    }


    public function getUserVacancies($id)
    {
        $vacancy = $this->vacancyRepository->getUserVacancy($id);
        return VacanciesTransformer::collection($vacancy);
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  VacancyRequest  $request
     * @param  Vacancy  $vacancy
     * @return JsonResource
     */
    public function update(VacancyRequest $request, Vacancy $vacancy)
    {
        $vacancy->update($request->all());
        return new VacanciesTransformer($vacancy);
    }

    public function close($id)
    {
        return Vacancy::find($id)->update(['status' => 2]);

    }

    /**
     * Remove the specified resource from storage.
     * @param  Vacancy  $vacancy
     */
    public function destroy(Vacancy $vacancy)
    {
        $vacancy->delete();
        return response()->json([
            'errors' => false,
            'id'=> $vacancy->id,
            'message' => "Vacancy was deleted",
        ]);
    }

    public function addTag($id ,VacancyTouchTag $request)
    {
        $tag = Tag::find($request->get('tag_id'));
        $vacancy = $this->vacancyRepository->find($id);
        $vacancy->tags()->save($tag);
        return new VacanciesTransformer($vacancy);
    }

    public function delTag($id ,VacancyTouchTag $request)
    {
        $tag = Tag::find($request->get('tag_id'));
        $tag->vacancies()->detach($id);
        $vacancy = $this->vacancyRepository->find($id);
        return new VacanciesTransformer($vacancy);
    }

}
