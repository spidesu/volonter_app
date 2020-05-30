<?php


namespace App\Http\Controllers\Swagger;


use App\Docs\Parameter;

trait TagSwagger
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
                ],
                [
                    "id" => 2,
                    "title" => "Вакансия 2",
                    "description" => "описание 2",
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
                ]

        ];
    }

    public static function getDocParametersUpdate()
    {
        return [
            Parameter::string('Authorization')->required()->header(),
            Parameter::string('title')->required()->formData(),
            Parameter::string('description')->required()->formData(),
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
                ]

        ];
    }
    public static function getDocParametersDestroy()
    {
        return [
            Parameter::string('Authorization')->required()->header(),
            //Parameter::number('id')->required()->formData(),
        ];
    }
    public static function getExampleResponseDataDestroy()
    {
        return [
            'errors' => false,
            'id'=> 1,
            'message' => "Vacancy was deleted",
        ];
    }

}
