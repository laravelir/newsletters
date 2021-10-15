<?php

namespace Laravelir\Newsletters\Providers;

use Illuminate\Support\ServiceProvider;
use Laravelir\Newsletters\Console\Commands\InstallPackageCommand;
use Laravelir\Newsletters\Newsletters;

class NewslettersServiceProvider extends ServiceProvider
{

    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . "/../../config/newsletters.php", 'newsletters');

        $this->registerFacades();
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

        if ($this->app->runningInConsole()) {
            $this->registerCommands();
            $this->registerPublishes();
            $this->publishConfig();
        }
    }

    private function registerFacades()
    {
        $this->app->bind('newsletters', function ($app) {
            return new Newsletters();
        });
    }

    private function registerPublishes()
    {
        $this->publishes([
            __DIR__ . '/../../config/newsletters.php' => config_path('newsletters.php')
        ], 'package-config');
    }

    private function registerCommands()
    {
        $this->commands([
            InstallPackageCommand::class,
        ]);
    }

    public function publishConfig()
    {
        $this->publishes([
            __DIR__ . '/../../config/newsletters.php' => config_path('newsletters.php')
        ], 'package-config');
    }
}
