## Laravel Email Confirmation ##

This package is to add email confirmation to Laravel 5.4 or 5.5 project.

It should be used after `php artisan make:auth` command but can also be added to existing project.

There is [a french presentation](http://laravel.sillo.org/ajouter-la-confirmation-de-lemail/) of this package.

### Features ###

- create a migration to add confirmation columns to users table
- create routes for confirmation
     `confirmation/resend`       
     `confirmation/{id}/{token}` 
- add an artisan command to override login and register views
- send email notification with registration
- add translations for notification (there are french, english and arabic ones)
- block login for not confirmed user and launch an alert with resend link for notification
- block auto login on password reset for not confirmed user

### Installation ###

Add package to your composer.json file :
```
    composer require bestmomo/laravel-email-confirmation
```

For Laravel 5.4add service provider to `config/app.php` (with Laravel 5.5 there is the package discovery):
```
    Bestmomo\LaravelEmailConfirmation\ServiceProvider::class,
```

Make a migration to add columns to users table :
```
    php artisan migrate
```

Change trait reference in `LoginController` :
```
    use Bestmomo\LaravelEmailConfirmation\Traits\AuthenticatesUsers;
```

Change trait reference in `RegisterController` :
```
    use Bestmomo\LaravelEmailConfirmation\Traits\RegistersUsers;
```

Change trait reference in `ResetPasswordController`:
```
    use Bestmomo\LaravelEmailConfirmation\Traits\ResetsPasswords;
```

### Publish ###

- If you have used the `php artisan make:auth` command

Override login and register views to get confirmation alerts :
```
    php artisan confirmation:auth
```

- If you have custom scaffold

You must add alerts in login and register views. Here are 2 examples with Bootstrap.

Login view :

```
@if (session('confirmation-success'))
    <div class="alert alert-success">
        {{ session('confirmation-success') }}
    </div>
@endif
@if (session('confirmation-danger'))
    <div class="alert alert-danger">
        {!! session('confirmation-danger') !!}
    </div>
@endif
```

Register view :

```
@if (session('confirmation-success'))
    <div class="alert alert-success">
        {{ session('confirmation-success') }}
    </div>
@endif
```

### Optional Publish ###

If you want to do some changes or add a language you can publish translations :
```
    php artisan vendor:publish --tag=confirmation:translations
```

If you want to do some changes to confirmation notification you can make a copy in App :
```
    php artisan confirmation:notification
```