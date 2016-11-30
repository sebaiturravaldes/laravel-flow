<?php

namespace Siturra\Flow;

use Illuminate\Support\ServiceProvider;

class FlowServiceProvider extends ServiceProvider
{
 	/**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = true;

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
 	{
        $this->registerFlowBuilder();

        $this->app->alias('flow', '\Siturra\Flow\FlowBuilder');
 	}

   
    /**
     * Register the Flow builder instance.
     *
     * @return void
     */
    protected function registerFlowBuilder()
    {
        $this->app->singleton('flow', function ($app) {
            return new FlowBuilder;
        });
    }

    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    
    public function boot()
    {
        $this->publishes([
            __DIR__.'/config/flow.php' => config_path('flow.php'),
            __DIR__.'/resources/views/'   => base_path('resources/views'),
            __DIR__.'/storage/' => base_path('storage'),
            __DIR__.'/FlowController.php' => base_path('app/Http/Controllers/FlowController.php'),
        ], 'flow');

        /*
        $this->loadViewsFrom(__DIR__.'/views', 'flow');
        $this->publishes([
            __DIR__.'/views/' => resource_path('views/flow'),
        ]);
        */

    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return ['flow', 'Siturra\Flow\FlowBuilder'];
    }
 }