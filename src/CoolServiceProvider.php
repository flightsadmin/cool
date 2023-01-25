<?php

namespace Flightsadmin\Cool;

use Illuminate\Support\ServiceProvider;

class CoolServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     */
    public function boot()
    {
		/**
         * Commands
         * Load the commands in 'src\Commands
         */
        if ($this->app->runningInConsole()) {
            $this->commands([
                \Flightsadmin\Cool\Commands\EnablePackageCommand::class,
                \Flightsadmin\Cool\Commands\DisablePackageCommand::class,
            ]);
        }
	}
    /**
     * Register the application services.
     */
    public function register()
    {
		//
    }
}
