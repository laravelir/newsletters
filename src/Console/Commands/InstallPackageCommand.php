<?php

namespace Laravelir\Newsletters\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallPackageCommand extends Command
{
    protected $signature = 'newsletters:install';

    protected $description = 'Install the newsletters Newsletters';

    public function handle()
    {
        $this->line("\t... Welcome To Newsletters Installer ...");

        //config
        if (File::exists(config_path('newsletters.php'))) {
            $confirm = $this->confirm("newsletters.php already exist. Do you want to overwrite?");
            if ($confirm) {
                $this->publishConfig();
                $this->info("config overwrite finished");
            } else {
                $this->info("skipped config publish");
            }
        } else {
            $this->publishConfig();
            $this->info("config published");
        }

        if (!empty(File::glob(database_path('migrations\*_create_newsletters_table.php')))) {
            $list  = File::glob(database_path('migrations\*_create_newsletters_table.php'));
            collect($list)->each(function ($item) {
                File::delete($item);
                $this->warn("Deleted: " . $item);
            });
        } else {
            $this->publishMigration();
        }

        $this->publishMigration();

        $this->info("Newsletters Successfully Installed.\n");
        $this->info("\t\tGood Luck.");
    }



    private function publishConfig()
    {
        $this->call('vendor:publish', [
            '--provider' => "Laravelir\\newsletters\Providers\\newslettersServiceProvider",
            '--tag'      => 'newsletters-config',
            '--force'    => true
        ]);
    }

    private function publishMigration()
    {
        $this->call('vendor:publish', [
            '--provider' => "Laravelir\\newsletters\Providers\\newslettersServiceProvider",
            '--tag'      => 'newsletters-migration',
            '--force'    => true
        ]);
    }
}
