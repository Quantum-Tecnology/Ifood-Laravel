<?php

namespace QuantumTecnology\IfoodLaravel\Provider;

use Illuminate\Support\ServiceProvider;

class IfoodLaravelProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/config.php', 'laravel-ifood');
    
        $this->app->singleton(
            IfoodAuthentication::class,
            function () {
                return new IfoodAuthentication();
            }
        );   
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([
                __DIR__ . '/../config/config.php' => config_path('ifood.php'),
            ], 'config');
        }

        $this->publishes([], 'config');
    }
}
