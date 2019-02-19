<?php

return [
    'prefix' => 'v1',
    'routes' => [
        'login' => [
            'route' => 'login',
        ],
        'register' => [
            'route' => 'register',
        ],
        'confirm-registration' => [
            'route' => '/register/{token}',
        ],
        'remind-password' => [
            'route' => '/remind-password',
        ],
        'reset-password' => [
            'route' => '/reset-password',
        ],
        'change-password' => [
            'route' => '/account/change-password',
        ],
    ],
    "disabled" => [

    ]
];