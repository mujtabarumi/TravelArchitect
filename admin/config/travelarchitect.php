<?php

return [

    'app' => [
        'domain' => env("APP_DOMAIN",''),
        'version' => '1.0.0',
        'updated_at' => \Carbon\Carbon::parse('01-Jan-2020')->toFormattedDateString(),
        'last_updated' => \Carbon\Carbon::parse(env('APP_LAST_UPDATE_AT', '01-Jan-2020'))->toFormattedDateString()
    ],

    "currency" => "USD",

    "user" => [
        "date_format" => "d M, Y"
    ],

    'locales' => [
        "en" => [
            "title" => "English",
            "flag" => "assets/images/en.png"
        ]
    ],

    "share" => [
        "services" => ['facebook', 'twitter', 'linkedin']
    ],
];
