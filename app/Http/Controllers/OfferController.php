<?php

namespace App\Http\Controllers;

use App\Entities\Offer;
use App\Http\Controllers\Swagger\OfferSwagger;
use App\Http\Requests\OfferRequest;
use App\Repositories\Providers\Offer\Eloquent\EloquentOfferRepository;
use App\Transformers\Offers\OffersTransformer;
use Illuminate\Http\Resources\Json\JsonResource;

class OfferController extends Controller
{
//    use OfferSwagger;

    protected $offerRepository;

    public function __construct(EloquentOfferRepository $offerRepository)
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
        dd(request());
        $offer = $this->offerRepository->create($request);
        return new OffersTransformer($offer);
    }

    /**
     * Display the specified resource.
     *
     * @param $id
     * @return JsonResource
     */
    public function show($id)
    {
        $vacancy = $this->offerRepository->getOffer($id);
        return new OffersTransformer($vacancy);
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

    public function acceptOffer($id)
    {
        return Offer::find($id)->update(['result' => true]);
    }

    public function offerHistory($user_id)
    {
        $history = $this->offerRepository->getUserOfferHistory($user_id);
        return OffersTransformer::collection($history);
    }
}
