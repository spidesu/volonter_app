<?php


namespace App\Http\Controllers\Swagger;


use App\Docs\Parameter;

trait UserSwagger
{
    public static function getDocParametersAddTag()
    {
        return [
            Parameter::string('Authorization')->required()->header(),
            Parameter::number('tag_id')->required()->formData(),
        ];
    }
    public static function getExampleResponseDataAddTag()
    {
        return [
            "data" => [
                "id" => 1,
                "login" => 'null',
                "email" => 'null',
                "first_name" => 'null',
                "last_name" => 'null',
                "phone" => 'null',
                "role_id" => 'null',
                "tags" => [
                    [
                        "id" => 1,
                        "title" => "вц",
                        "description" => "цв",
                        "pivot" => [
                            "target_id" => 1,
                            "tag_id" => 1,
                            "target_type" => "App\User"
                        ]
                    ]
                ]
            ]
        ];
    }
    public static function getDocParametersDelTag()
    {
        return [
            Parameter::string('Authorization')->required()->header(),
            Parameter::number('tag_id')->required()->formData(),
        ];
    }
    public static function getExampleResponseDataDelTag()
    {
        return [
            "data" => [
                "id" => 1,
                "login" => 'null',
                "email" => 'null',
                "first_name" => 'null',
                "last_name" => 'null',
                "phone" => 'null',
                "role_id" => 'null',
                "tags" => [
                    [
                        "id" => 1,
                        "title" => "вц",
                        "description" => "цв",
                        "pivot" => [
                            "target_id" => 1,
                            "tag_id" => 1,
                            "target_type" => "App\User"
                        ]
                    ]
                ]
            ]
        ];
    }

}
