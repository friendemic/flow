<?php

namespace Friendemic\Flow;

use Illuminate\Support\ServiceProvider;

class FlowServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
	    if ($this->app->runningInConsole()) {
			$this->publishes([
        		__DIR__.'/../config/flow.php' => config_path('flow.php'),
			], 'flow-config');
		}
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
		$this->app->singleton(Flow::class, function ($app) {
			return new Flow(config('flow'));
		});
    }
}
