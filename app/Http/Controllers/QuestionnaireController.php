<?php

namespace App\Http\Controllers;

use App\Http\Resources\QuestionnaireResource;
use App\Questionnaire;
use App\Repositories\QuestionnaireRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionnaireController extends Controller
{
    public $questionnaireRepository;
    /**
     * UserController constructor.
     */
    public function __construct()
    {
        //parent::__construct();
        $this->questionnaireRepository = app(QuestionnaireRepository::class);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //return response()->json(User::all());
        $user = Auth::id();
        $questionnaire = $this->questionnaireRepository->getQuestionnaireByUserId($user);
        return new QuestionnaireResource($questionnaire);
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
        $data = $request->only('birth_date','about','tags','experience','about','experience_about');
        $questionnaire = $this->questionnaireRepository->create($data);

        return new QuestionnaireResource($questionnaire);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $questionnaire = $this->questionnaireRepository->getQuestionnaireInfo($id);
        return new QuestionnaireResource($questionnaire);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getByUserId($id)
    {
        $questionnaire = $this->questionnaireRepository->getQuestionnaireByUserId($id);
        return new QuestionnaireResource($questionnaire);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        return (Questionnaire::find($id)->update($request->all()));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
