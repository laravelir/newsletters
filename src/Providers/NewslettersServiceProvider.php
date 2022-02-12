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

        $this->registerCommands();
        $this->publishConfig();
        $this->publishMigrations();
    }

    private function registerFacades()
    {
        $this->app->bind('newsletters', function ($app) {
            return new Newsletters();
        });
    }

    private function registerCommands()
    {
        if ($this->app->runningInConsole()) {
            $this->commands([
                InstallPackageCommand::class,
            ]);
        }
    }

    public function publishConfig()
    {
        $this->publishes([
            __DIR__ . '/../../config/newsletters.php' => config_path('newsletters.php')
        ], 'newsletters-config');
    }

    protected function publishMigrations()
    {
        $timestamp = date('Y_m_d_His', time());
        $this->publishes([
            __DIR__ . '/../../database/migrations/create_newsletters_table.stub' => database_path() . "/migrations/{$timestamp}_create_newsletters_table.php",
        ], 'newsletters-migration');
    }
}
