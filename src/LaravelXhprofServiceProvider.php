<?php

namespace Zehua\LaravelXhprof;


use Illuminate\Support\ServiceProvider;
use Zehua\LaravelXhprof\Middleware\StartXhprof;

class LaravelXhprofServiceProvider extends ServiceProvider
{

    /**
     * Register the service provider.
     */
    public function register()
    {
        $this->app->singleton('xhprof', function ($app) {
            return $app->make(Xhprof::class);
        });
        $this->app->singleton(StartXhprof::class);
    }

    public function provides()
    {
        return [
            'xhprof',
        ];
    }
}