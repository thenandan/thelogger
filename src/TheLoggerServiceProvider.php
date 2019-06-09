<?php

namespace nandank\thelogger;

use Illuminate\Contracts\Http\Kernel;
use Illuminate\Support\ServiceProvider;
use TheNandan\TheLogger\Http\Middleware\TheRequestLogger;

class theLoggerServiceProvider extends ServiceProvider
{
    /**
     * Perform post-registration booting of services.
     *
     * @return void
     */
    public function boot()
    {
        //
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

        $this->registerMiddleware();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        //
    }
    
    /**
     * Console-specific booting.
     *
     * @return void
     */
    protected function bootForConsole()
    {
        //
    }


    private function registerMiddleware()
    {
        $kernel = $this->app->make(Kernel::class);
        $kernel->pushMiddleware(TheRequestLogger::class);
    }
}
