<?php

namespace App\Providers;

use App\Http\ViewComposers;
use App\Models\Menu;
use Illuminate\Support\Facades\Blade;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ThemeServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any ViewServiceProvider services.
     *
     * @return void
     */
    public function boot()
    {
        // -- Misc

        View::composer('layouts.app', ViewComposers\AppViewComposer::class);
    }
}
