<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Swagger\TagSwagger;
use App\Http\Requests\TagRequest;
use App\Repositories\Providers\Tag\TagRepository;
use App\Entities\Tag;
use App\Transformers\Tags\TagsTransformer;
use App\Transformers\Vacancies\VacanciesTransformer;
use Illuminate\Http\Resources\Json\JsonResource;

class TagController extends Controller
{
    use TagSwagger;

    protected $tagRepository;

    public function __construct(TagRepository $tagRepository)
    {
        $this->tagRepository = $tagRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return JsonResource
     */
    public function index()
    {
        return TagsTransformer::collection($this->tagRepository->all());
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  TagRequest  $request
     * @return JsonResource
     */
    public function store(TagRequest $request)
    {
        $tag = $this->tagRepository->create($request);
        return new TagsTransformer($tag);
    }

    /**
     * Display the specified resource.
     *
     * @param  Tag  $tag
     * @return JsonResource
     */
    public function show(Tag $tag)
    {
        return new VacanciesTransformer($tag);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  TagRequest  $request
     * @param  Tag  $tag
     * @return JsonResource
     */
    public function update(TagRequest $request, Tag $tag)
    {
        $tag->update($request->all());
        return new TagsTransformer($tag);
    }

    /**
     * Remove the specified resource from storage.
     * @param  Tag  $tag
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return response()->json([
            'errors' => false,
            'id'=> $tag->id,
            'message' => "Tag was deleted",
        ]);
    }
}
