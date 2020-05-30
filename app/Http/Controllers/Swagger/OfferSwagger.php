<?php


namespace App\Http\Controllers\Swagger;


use App\Docs\Parameter;

trait OfferSwagger
{
    public static function getDocParametersIndex()
    {
        return [
            Parameter::string('Authorization')->required()->header(),
        ];
    }
    public static function getExampleResponseDataIndex()
    {
        return [
            "data" => [
                [
                    "id" => 1,
                    "title" => "Вакансия 1",
                    "description" => "описание 1",
                    "user" => 'relate',
                    "vacancy" => 'relate',
                ],
                [
                    "id" => 2,
                    "title" => "Вакансия 2",
                    "description" => "описание 2",
                    "user" => 'relate',
                    "vacancy" => 'relate',

                ]
            ]
        ];
    }
    public static function getDocParametersStore()
    {
        return [
            Parameter::string('Authorization')->required()->header(),
            Parameter::string('title')->required()->formData(),
            Parameter::string('description')->required()->formData(),
            Parameter::number('users_id')->required()->formData(),
            Parameter::number('vacancies_id')->required()->formData(),
        ];
    }
    public static function getExampleResponseDataStore()
    {
        return [
            "data" =>
                [
                    "id" => 1,
                    "title" => "Вакансия 1",
                    "description" => "описание 1",
                    "user" => 'relate',
                    "vacancy" => 'relate',
                ]

        ];
    }

    public static function getDocParametersUpdate()
    {
        return [
            Parameter::string('Authorization')->required()->header(),
            Parameter::string('title')->required()->formData(),
            Parameter::string('description')->required()->formData(),
            Parameter::number('users_id')->required()->formData(),
            Parameter::number('vacancies_id')->required()->formData(),
        ];
    }
    public static function getExampleResponseDataUpdate()
    {
        return [
            "data" =>
                [
                    "id" => 1,
                    "title" => "Вакансия 1",
                    "description" => "описание 1",
                    "user" => 'relate',
                    "vacancy" => 'relate',
                ]

        ];
    }

    public static function getDocParametersShow()
    {
        return [
            Parameter::string('Authorization')->required()->header(),
        ];
    }
    public static function getExampleResponseDataShow()
    {
        return [
            "data" =>
                [
                    "id" => 1,
                    "title" => "Вакансия 1",
                    "description" => "описание 1",
                    "user" => 'relate',
                    "vacancy" => 'relate',
                ]

        ];
    }
    public static function getDocParametersDestroy()
    {
        return [
            Parameter::string('Authorization')->required()->header(),
        ];
    }
    public static function getExampleResponseDataDestroy()
    {
        return [
            'errors' => false,
            'id'=> 1,
            'message' => "Offer was deleted",
        ];
    }

}
