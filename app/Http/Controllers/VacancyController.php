<?php

namespace App\Http\Controllers;

use App\Docs\Parameter;
use App\Repositories\Providers\Vacancy\VacancyRepository;
use App\Entities\Vacancy;
use App\Transformers\Vacancies\VacanciesTransformer;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VacancyController extends Controller
{
    protected $vacancyRepository;

    public function __construct(VacancyRepository $vacancyRepository)
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

    public static function getDocParametersIndex()
    {
        return [
            Parameter::string('Authorization')->header(),
        ];
    }
    public static function getExampleResponseDataIndex()
    {
        return [
            "data" => [
                [
                    "id" => 1,
                    "title" => "Вакансия 1",
                    "description" => "описание 1"
                ],
                [
                    "id" => 2,
                    "title" => "Вакансия 2",
                    "description" => "описание 2"
                ]
            ]
        ];
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function show(Vacancy $vacancy)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function edit(Vacancy $vacancy)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Vacancy $vacancy)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Vacancy  $vacancy
     * @return \Illuminate\Http\Response
     */
    public function destroy(Vacancy $vacancy)
    {
        //
    }
}
