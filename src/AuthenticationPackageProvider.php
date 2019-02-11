<?php

namespace Shortcodes\Authentication;

use Illuminate\Support\ServiceProvider;

class AuthenticationPackageProvider extends ServiceProvider
{
    public function register()
    {
        //
    }

    public function boot()
    {
        $this->loadViewsFrom(__DIR__.'/views', 'authentication-package');
        $this->loadRoutesFrom(__DIR__.'/routes/routes.php');

        $this->publishes([
            __DIR__.'/views' => base_path('resources/views/authentication-package'),
            __DIR__.'/config/authentication-package.php' => config_path('authentication-package.php'),

        ]);
    }
}
