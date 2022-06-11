<?php

namespace App\Providers;

use App\Http\ViewComposers;
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
        // -- Composers

        View::composer(['layout', 'admin.pages.*'], ViewComposers\AppViewComposer::class);
    }
}
