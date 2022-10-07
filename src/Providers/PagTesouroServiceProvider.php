<?php

namespace Vsilva472\PagTesouro\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Support\ServiceProvider;
use Vsilva472\PagTesouro\Contracts\Http;

class PagTesouroServiceProvider extends ServiceProvider
{    
    /**
     * @var array
     */
    protected $providers = [
        \Vsilva472\PagTesouro\Providers\EventServiceProvider::class
    ];

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->loadConfigs();
        $this->registerProviders();
        $this->registerBinds();
        $this->loadRoutes();
    }

    /**
     * Register this package servide providers
     * 
     * @see config/pagtesouro.php
     * @return void
     */
    protected function registerProviders()
    {
        foreach ($this->providers as $provider) 
        {
            $this->app->register($provider);
        }
    }

    /**
     * Register de binds of package
     * 
     * @see config/pagtesouro.php
     */
    protected function registerBinds()
    {
        $binds = config('pagtesouro.binds');
        
        foreach ($binds as $abstraction => $implementation) 
        {
            $this->app->when($implementation)
                ->needs(Http::class)
                ->give(function () {
                    return $this->app->make(config('pagtesouro.http_client'));
                });

            $this->app->bind($abstraction, $implementation);
        }
    }

    /**
     * Register configuration
     * 
     * @return void
     */
    protected function loadConfigs()
    {
        $configPath = $this->packagePath('config/pagtesouro.php');
        $this->mergeConfigFrom($configPath, 'pagtesouro');
        $this->publishes([$configPath => config_path('pagtesouro.php')], 'pagtesouro');
    }

    /**
     * Load the package routes
     * 
     * @return void
     */
    protected function loadRoutes()
    {
        $routesConfig = [
            'as' => 'pagtesouro.',
            'prefix' => 'pagtesouro',
            'middleware' => ['web'],
        ];

        Route::group($routesConfig, function () {
            $routesPath = $this->packagePath('routes/pagtesouro.php');
            $this->loadRoutesFrom($routesPath);
        });
    }

    /**
     * Get the package path
     * 
     * @return void
     */
    protected function packagePath($path) 
    {
        return sprintf('%s/../../%s', __DIR__, $path);
    }
}
