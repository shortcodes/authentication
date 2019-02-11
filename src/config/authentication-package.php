<?php

return [
    'prefix' => 'v1',
    'routes' => [
        'login' => 'login',
        'register' => 'register',
        'confirm-registration' => '/register/{token}',
        'remind-password' => '/remind-password',
        'reset-password' => '/reset-password',
        'change-password' => '/account/change-password',
    ],
];