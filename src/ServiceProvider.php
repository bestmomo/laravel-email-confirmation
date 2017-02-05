<?php

namespace Bestmomo\LaravelEmailConfirmation;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Illuminate\Console\DetectsApplicationNamespace;

class ServiceProvider extends BaseServiceProvider
{

    use DetectsApplicationNamespace;

    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        $packagePath = __DIR__.'/../';

        // Routes
        $this->app->router->group([
                'middleware' => 'web',
                'namespace' => $this->getAppNamespace() . 'Http\Controllers'
            ], function() use($packagePath) {
                require $packagePath . 'routes/web.php';
            }
        );

        // Translations
        $translationsPath = $packagePath . 'publishable/translations';
        
        $this->loadTranslationsFrom($translationsPath, 'confirmation');

        $this->publishes([
            $translationsPath => resource_path('lang/vendor/confirmation'),
        ], 'confirmation:translations');

        // Migration
        $this->loadMigrationsFrom($packagePath . 'database/migrations');

        // Command
        if ($this->app->runningInConsole()) {
            $this->commands([
                Commands\AuthCommand::class,
                Commands\NotificationCommand::class,
            ]);
        }
    }

    /**
     * Register bindings in the container.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
