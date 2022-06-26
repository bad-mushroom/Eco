<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class Setup extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'eco:setup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sets up a new installation of Eco.';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->generateAppKey();
        $this->copyTheme();
        $this->migrateAndSeed();

        Artisan::call('eco:publish-theme-assets');

        $this->info('Setup complete!');
    }

    protected function copyTheme()
    {
        $from = resource_path('themes/ecosphere');
        $to = theme_path('ecosphere');

        if (File::copyDirectory($from, $to)) {
            $this->info(' - Eco theme copied to user content.');
        } else {
            $this->error(' - Failed to copy Ecosphere theme.');
        }
    }

    protected function migrateAndSeed()
    {
        Artisan::call('migrate');
        Artisan::call('db:seed');

        $this->info(' - Database and seeding completed.');
    }

    protected function generateAppKey()
    {
        Artisan::call('key:generate');
    }
}
