<?php

namespace App\Providers;

use App\Services\StoryTypes\StoryTypeService;
use Illuminate\Support\ServiceProvider;

class StoryTypeServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(ServiceProvider::class, fn () => new StoryTypeService());
    }
}
