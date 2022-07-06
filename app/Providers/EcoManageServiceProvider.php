<?php

namespace App\Providers;

use App\Http\ViewComposers;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class EcoManageServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any ViewServiceProvider services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['manage.*'], ViewComposers\ManagerViewComposer::class);
    }
}
