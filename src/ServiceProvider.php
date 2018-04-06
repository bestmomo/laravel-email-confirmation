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
        if (! class_exists('AddConfirmation')) {
            $timestamp = date('Y_m_d_His', time());
            $this->publishes([
                __DIR__.'/../database/migrations/add_confirmation.php.stub' => $this->app->databasePath()."/migrations/{$timestamp}_add_confirmation.php",
            ], 'confirmation:migrations');
        }

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
