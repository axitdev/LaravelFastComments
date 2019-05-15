<?php

namespace Axitdev\LaravelFastComments;

use Illuminate\Support\ServiceProvider;

class LaravelFastCommentsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
        $this->publishes([
            realpath(__DIR__.'/../migrations') => database_path('migrations'),
        ], 'migrations');
    }

    /**
     * Register the application services.
     */
    public function register()
    {
        //
    }
}
