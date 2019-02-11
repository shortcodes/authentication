<?php

use Shortcodes\Authentication\Controllers\Auth\LoginController;
use Shortcodes\Authentication\Controllers\Auth\PasswordController;
use Shortcodes\Authentication\Controllers\Auth\RegisterController;

Route::post(config('authentication-package.routes.login', '/login'), [LoginController::class, 'login'])->name('login');
Route::post(config('authentication-package.routes.register', '/register'), [RegisterController::class, 'register'])->name('register');
Route::post(config('authentication-package.routes.confirm-registration', '/register/{token}'), [RegisterController::class, 'confirmRegistration'])->name('confirm-registration');
Route::post(config('authentication-package.routes.remind-password', '/remind-password'), [PasswordController::class, 'remindPassword'])->name('remind-password');
Route::post(config('authentication-package.routes.reset-password', '/reset-password'), [PasswordController::class, 'resetPassword'])->name('reset-password');