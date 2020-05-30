<?php


namespace App\Repositories;
use App\User as Model;

class UserRepository extends BaseRepository
{


    /**
     * @return string
     */
    protected function getModelClass()
    {
        return Model::class;
    }

    /**
     *Имя пользователя
     *
     * @param int $id
     * @return string
     */
    public function getUserName($id) {

        $columns= [
            'login'
        ];

        $user= $this->startConditions()
            ->where('id', $id)
            ->toBase()
            ->first($columns);

        return $user;

    }

    /**
     *
     * Профиль пользователя
     *
     * @param int $id
     * @return mixed
     */
    public function getProfileInfo($id) {

        $columns = [
            'id','login','url_avatar', 'role_id', 'created_at'
        ];

        $user = $this->startConditions()
            ->where('id', $id)
            ->with('role:id,title','rooms')
            ->first($columns);
        return $user;

    }


    public function searchUser() {

    }
}
