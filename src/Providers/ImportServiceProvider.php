<?php

namespace Vcian\LaravelDataBringin\Providers;

use Illuminate\Support\ServiceProvider;

class ImportServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        $this->mergeConfigFrom(
            __DIR__.'/../../config/data-bringin.php', 'data-bringin'
        );
        $this->publishes([
            __DIR__.'/../../config/data-bringin.php' => config_path('data-bringin.php'),
        ], 'data-bringin-config');
        $this->loadRoutesFrom(__DIR__.'/../../routes/web.php');
        $this->loadViewsFrom(__DIR__.'/../../resources/views', 'data-bringin');
    }
}
