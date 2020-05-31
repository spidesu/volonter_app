<?php


namespace App\Http\Controllers\Swagger;


use App\Docs\Parameter;

trait VacancySwagger
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
                    "date_start" => 'null',
                    "date_end" => 'null',
                    "offers" => [
                        [
                            "id" => 1,
                            "title" => "ауа",
                            "description" => "уауау",
                            "users_id" => 1,
                            "vacancies_id" => 1
                        ]
                    ]
                ],
                [
                    "id" => 2,
                    "title" => "Вакансия 2",
                    "description" => "описание 2",
                    "date_start" => 'null',
                    "date_end" => 'null',
                    "offers" => [
                        [
                            "id" => 2,
                            "title" => "ауа",
                            "description" => "уауау",
                            "users_id" => 1,
                            "vacancies_id" => 2
                        ],
                        [
                            "id" => 3,
                            "title" => "ауа",
                            "description" => "уауау",
                            "users_id" => 1,
                            "vacancies_id" => 2
                        ]
                    ]
                ],
                [
                    "id" => 3,
                    "title" => "Вакансия апи",
                    "description" => "описание апи",
                    "date_start" => "2020-05-01 03:08:00",
                    "date_end" => "2020-05-27 03:08:00",
                    "offers" => [
                    ]
                ],
                [
                    "id" => 4,
                    "title" => "Вакансия апи",
                    "description" => "описание апи",
                    "date_start" => 'null',
                    "date_end" => 'null',
                    "offers" => [
                    ]
                ],
                [
                    "id" => 10,
                    "title" => "Вакансия апи",
                    "description" => "описание апи",
                    "date_start" => "2020-05-01 03:08:00",
                    "date_end" => 'null',
                    "offers" => [
                    ]
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
            Parameter::string('date_start')->required()->formData(),
            Parameter::string('date_end')->required()->formData(),
        ];
    }
    public static function getExampleResponseDataStore()
    {
        return [
            "data" => [
                "id" => 2,
                "title" => "Вакансия 2",
                "description" => "описание 2",
                "date_start" => 'null',
                "date_end" => 'null',
                "offers" => 'null'
            ]
        ];
    }

    public static function getDocParametersUpdate()
    {
        return [
            Parameter::string('Authorization')->required()->header(),
            Parameter::string('title')->required()->formData(),
            Parameter::string('description')->required()->formData(),
            Parameter::string('date_start')->required()->formData(),
            Parameter::string('date_end')->required()->formData(),
        ];
    }
    public static function getExampleResponseDataUpdate()
    {
        return [
            "data" => [
                "id" => 2,
                "title" => "Вакансия 2",
                "description" => "описание 2",
                "date_start" => 'null',
                "date_end" => 'null',
                "offers" => [
                    [
                        "id" => 2,
                        "title" => "ауа",
                        "description" => "уауау",
                        "users_id" => 1,
                        "vacancies_id" => 2
                    ],
                    [
                        "id" => 3,
                        "title" => "ауа",
                        "description" => "уауау",
                        "users_id" => 1,
                        "vacancies_id" => 2
                    ]
                ]
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
            "data" => [
                "id" => 2,
                "title" => "Вакансия 2",
                "description" => "описание 2",
                "date_start" => 'null',
                "date_end" => 'null',
                "offers" => [
                    [
                        "id" => 2,
                        "title" => "ауа",
                        "description" => "уауау",
                        "users_id" => 1,
                        "vacancies_id" => 2
                    ],
                    [
                        "id" => 3,
                        "title" => "ауа",
                        "description" => "уауау",
                        "users_id" => 1,
                        "vacancies_id" => 2
                    ]
                ]
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
            'message' => "Tag was deleted",
        ];
    }
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
                "title" => "Вакансия 1",
                "description" => "описание 1",
                "date_start" => 'null',
                "date_end" => 'null',
                "offers" => [
                    [
                        "id" => 1,
                        "title" => "ауа",
                        "description" => "уауау",
                        "user" => [
                            "id" => 1,
                            "login" => "feil.candida",
                            "email" => "theron43@example.org",
                            "api_token" => 'null',
                            "active" => 1,
                            "url_avatar" => 'null',
                            "role_id" => 1,
                            "created_at" => "2020-05-30T14:21:58.000000Z",
                            "updated_at" => "2020-05-30T14:21:58.000000Z",
                            "deleted_at" => 'null',
                            "first_name" => "",
                            "last_name" => "",
                            "middle_name" => "",
                            "phone" => ""
                        ],
                        "result" => 0,
                        "review" => 'null'
                    ]
                ],
                "user" => 'null',
                "city" => "",
                "address" => "",
                "status" => 1,
                "tags" => [
                    [
                        "id" => 3,
                        "title" => "тест",
                        "description" => "тест2",
                        "pivot" => [
                            "target_id" => 1,
                            "tag_id" => 3,
                            "target_type" => "App\Entities\Vacancy"
                        ]
                    ],
                    [
                        "id" => 2,
                        "title" => "тест",
                        "description" => "тест2",
                        "pivot" => [
                            "target_id" => 1,
                            "tag_id" => 2,
                            "target_type" => "App\Entities\Vacancy"
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
                "title" => "Вакансия 1",
                "description" => "описание 1",
                "date_start" => 'null',
                "date_end" => 'null',
                "offers" => [
                    [
                        "id" => 1,
                        "title" => "ауа",
                        "description" => "уауау",
                        "user" => [
                            "id" => 1,
                            "login" => "feil.candida",
                            "email" => "theron43@example.org",
                            "api_token" => 'null',
                            "active" => 1,
                            "url_avatar" => 'null',
                            "role_id" => 1,
                            "created_at" => "2020-05-30T14:21:58.000000Z",
                            "updated_at" => "2020-05-30T14:21:58.000000Z",
                            "deleted_at" => 'null',
                            "first_name" => "",
                            "last_name" => "",
                            "middle_name" => "",
                            "phone" => ""
                        ],
                        "result" => 0,
                        "review" => 'null'
                    ]
                ],
                "user" => 'null',
                "city" => "",
                "address" => "",
                "status" => 1,
                "tags" => [
                    [
                        "id" => 3,
                        "title" => "тест",
                        "description" => "тест2",
                        "pivot" => [
                            "target_id" => 1,
                            "tag_id" => 3,
                            "target_type" => "App\Entities\Vacancy"
                        ]
                    ],
                    [
                        "id" => 2,
                        "title" => "тест",
                        "description" => "тест2",
                        "pivot" => [
                            "target_id" => 1,
                            "tag_id" => 2,
                            "target_type" => "App\Entities\Vacancy"
                        ]
                    ]
                ]
            ]
        ];
    }

}
