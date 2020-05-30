<?php

namespace App\Http\Controllers;

use App\Entities\Offer;
use App\Http\Controllers\Swagger\OfferSwagger;
use App\Http\Requests\OfferRequest;
use App\Repositories\Providers\Offer\OfferRepository;
use App\Transformers\Offers\OffersTransformer;
use App\Transformers\Vacancies\VacanciesTransformer;
use Illuminate\Http\Resources\Json\JsonResource;

class OfferController extends Controller
{
    use OfferSwagger;

    protected $offerRepository;

    public function __construct(OfferRepository $offerRepository)
    {
        $this->offerRepository = $offerRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return JsonResource
     */
    public function index()
    {
        return OffersTransformer::collection($this->offerRepository->all());
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  OfferRequest  $request
     * @return JsonResource
     */
    public function store(OfferRequest $request)
    {
        $offer = $this->offerRepository->create($request);
        return new OffersTransformer($offer);
    }

    /**
     * Display the specified resource.
     *
     * @param  Offer  $offer
     * @return JsonResource
     */
    public function show(Offer $offer)
    {
        return new VacanciesTransformer($offer);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  OfferRequest  $request
     * @param  Offer  $offer
     * @return JsonResource
     */
    public function update(OfferRequest $request, Offer $offer)
    {
        $offer->update($request->all());
        return new OffersTransformer($offer);
    }

    /**
     * Remove the specified resource from storage.
     * @param  Offer  $offer
     */
    public function destroy(Offer $offer)
    {
        $offer->delete();
        return response()->json([
            'errors' => false,
            'id'=> $offer->id,
            'message' => "Offer was deleted",
        ]);
    }
}
