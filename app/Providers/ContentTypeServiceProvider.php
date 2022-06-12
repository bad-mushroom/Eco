<?php

namespace App\Providers;

use App\Services\ContentTypes\ContentTypeService;
use Illuminate\Support\ServiceProvider;

class ContentTypeServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->singleton(ServiceProvider::class, fn () => new ContentTypeService());
    }
}
