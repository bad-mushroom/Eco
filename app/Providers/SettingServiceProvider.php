<?php

namespace App\Providers;

use App\Services\Settings\SettingsService;
use Illuminate\Support\ServiceProvider;

class SettingServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(ServiceProvider::class, fn () => new SettingsService());
    }
}
