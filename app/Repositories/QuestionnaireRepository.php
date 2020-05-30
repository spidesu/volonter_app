<?php


namespace App\Repositories;
use App\Questionnaire as Model;
use Illuminate\Support\Facades\Auth;

class QuestionnaireRepository extends BaseRepository
{


    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    public function create($data) {

        if (!isset($data['user_id'])) {
            $data['user_id'] = Auth::id();
        }
        $questionnaire = $this->startConditions()
            ->create($data);

        return $questionnaire;
    }

    public function show() {


    }

    public function getQuestionnaireInfo($id)
    {
        $columns = ['id','type_id','birth_date','experience','about','experience_about','user_id','city'];
        $questionnaire = $this->startConditions()
            ->where('id', $id)
            ->toBase()
            ->first($columns);
        return $questionnaire;
    }

    public function getQuestionnaireByUserId($id)
    {
        $columns = ['id','type_id','birth_date','experience','about','experience_about','user_id','city'];
        $questionnaire = $this->startConditions()
            ->where('user_id', $id)
            ->toBase()
            ->first($columns);
        return $questionnaire;
    }

}
