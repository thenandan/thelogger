<?php

namespace nandank\thelogger;

use Illuminate\Support\ServiceProvider;

class theLoggerServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        // $this->loadTranslationsFrom(__DIR__.'/../resources/lang', 'thenandan');
        // $this->loadViewsFrom(__DIR__.'/../resources/views', 'thenandan');
        // $this->loadMigrationsFrom(__DIR__.'/../database/migrations');
        // $this->loadRoutesFrom(__DIR__.'/routes.php');

        // Publishing is only necessary when using the CLI.
        if ($this->app->runningInConsole()) {
            $this->bootForConsole();
        }
    }

    /**
     * Register any package services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__.'/../config/thelogger.php', 'theLogger');

        // Register the service the package provides.
        $this->app->singleton('theLogger', function ($app) {
            return new theLogger;
        });
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['theLogger'];
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        // Publishing the configuration file.
        $this->publishes([
            __DIR__.'/../config/thelogger.php' => config_path('TheLogger.php'),
        ], 'theLogger.config');

        // Publishing the views.
        /*$this->publishes([
            __DIR__.'/../resources/views' => base_path('resources/views/vendor/thenandan'),
        ], 'theLogger.views');*/

        // Publishing assets.
        /*$this->publishes([
            __DIR__.'/../resources/assets' => public_path('vendor/thenandan'),
        ], 'theLogger.views');*/

        // Publishing the translation files.
        /*$this->publishes([
            __DIR__.'/../resources/lang' => resource_path('lang/vendor/thenandan'),
        ], 'theLogger.views');*/

        // Registering package commands.
        // $this->commands([]);
    }
}