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
            __DIR__.'/Annotations' => app_path('Annotations/vendor/authentication-package'),
            __DIR__.'/views' => resource_path('views/vendor/authentication-package'),
            __DIR__.'/config/authentication-package.php' => config_path('authentication-package.php'),

        ]);
    }
}
