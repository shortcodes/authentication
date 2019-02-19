<?php

use Shortcodes\Authentication\Controllers\Auth\LoginController;
use Shortcodes\Authentication\Controllers\Auth\PasswordController;
use Shortcodes\Authentication\Controllers\Auth\RegisterController;

Route::group(['prefix' => config('authentication-package.prefix', 'v1')], function () {

    if (in_array('login', config('authentication-package.disabled'))) {
        Route::post(config('authentication-package.routes.login.route', '/login'), [config('authentication-package.routes.login.controller', LoginController::class), 'login'])->name('login');
    }
    if (in_array('register', config('authentication-package.disabled'))) {
        Route::post(config('authentication-package.routes.register.route', '/register'), [config('authentication-package.routes.register.controller', RegisterController::class), 'register'])->name('register');
    }
    if (in_array('confirm-registration', config('authentication-package.disabled'))) {
        Route::post(config('authentication-package.routes.confirm-registration.route', '/register/{token}'), [config('authentication-package.routes.confirm-registration.controller', RegisterController::class), 'confirmRegistration'])->name('confirm-registration');
    }
    if (in_array('remind-password', config('authentication-package.disabled'))) {
        Route::post(config('authentication-package.routes.remind-password.route', '/remind-password'), [config('authentication-package.routes.remind-password.controller', PasswordController::class), 'remindPassword'])->name('remind-password');
    }
    if (in_array('reset-password', config('authentication-package.disabled'))) {
        Route::post(config('authentication-package.routes.reset-password.route', '/reset-password'), [config('authentication-package.routes.reset-password.controller', PasswordController::class), 'resetPassword'])->name('reset-password');
    }

    Route::group(['middleware' => 'auth:api'], function () {
        if (in_array('change-password', config('authentication-package.disabled'))) {
            Route::post(config('authentication-package.routes.change-password.route', '/account/change-password'), [config('authentication-package.routes.change-password.controller', PasswordController::class), 'changePassword']);
        }
    });

});
