<?php

return [
    'routes' => [
        'login' => 'login',
        'register' => 'register',
        'confirm-registration' => '/register/{token}',
        'remind-password' => '/remind-password',
        'reset-password' => '/reset-password',
    ],
];