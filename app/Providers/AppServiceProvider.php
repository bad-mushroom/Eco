<?php

namespace App\Providers;

use App\Models\Story;
use App\Services\Settings\Facades\Setting;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        if ($this->app->environment('local')) {
            $this->app->register(\Laravel\Telescope\TelescopeServiceProvider::class);
            $this->app->register(TelescopeServiceProvider::class);
        }
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrapFive();

        Relation::morphMap([
            'Story' => Story::class,
        ]);

        View::getFinder()
            ->setPaths([
                resource_path('views/manage'),
                resource_path('views'),
                resource_path('views/theme'),
                theme_path(Setting::get('theme') . '/views'),
            ]);
    }
}
