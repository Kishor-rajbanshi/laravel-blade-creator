<?php

namespace Kishor\BladeCreator\Providers;

use Illuminate\Support\ServiceProvider;
use Kishor\BladeCreator\Console\BladeCreatorCommand;

class BladeCreatorProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                BladeCreatorCommand::class
            ]);
        }
    }
}
