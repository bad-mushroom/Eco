<?php

namespace App\Providers;

use App\Http\ViewComposers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ManageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any ViewServiceProvider services.
     *
     * @return void
     */
    public function boot()
    {
        // -- Composers

        View::composer(['layout'], ViewComposers\AppViewComposer::class);
        View::composer(['manage.partials.sidebar', 'manage.pages.stories.sidebar'], ViewComposers\SidebarViewComposer::class);
    }
}
