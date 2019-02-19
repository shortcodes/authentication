# authentication
Package with basic controllers, routes and specyfication to speed up development process

# initial package provides routes

- /login
- /register,
- /register/{token}
- /remind-password
- /reset-password
- /account/change-password

You can change those endpoints in config file

**authentication-package.php**

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

By default prefix set to those endpoints is **v1** but it is also changable

# Email

Some endpoints ( register, reset-password) sends emails to user. By default there is no layout
but you can customize it by publishing emails
 
# Documentation

Package constain swagger 3.0 annotations which are also publishable

# Publish

To publish all assets and configs you simple need to run 

    php artisan vendor:publish --provider="Shortcodes\Authentication\AuthenticationPackageProvider"
