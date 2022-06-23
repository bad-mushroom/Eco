<?php

namespace App\Console\Commands;

use App\Services\Settings\Facades\Setting;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class PublishThemeAssets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'eco:publish-theme-assets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = "Publish the active theme's assets to the public directory.";

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $theme = Setting::get('theme');

        $themeAssetsDir = theme_path($theme . '/dist');
        $publicAssetsDir = public_path('theme');

        File::copyDirectory($themeAssetsDir, $publicAssetsDir);
    }
}
