<?php

namespace App\Providers;

use App\Http\ViewComposers;
use App\Services\Settings\Facades\Setting;
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
        // -- Composers

        View::composer(['layout'], ViewComposers\ThemeViewComposer::class);
        View::composer(['*', 'home'], ViewComposers\AppViewComposer::class);
        View::composer('partials.widgetbar', ViewComposers\SidebarViewComposer::class);

        // -- Blade Directives

        Blade::directive('author', function ($story) {
            return '<?php echo "<span class=\"h-card p-author\">" . with($story)->author->name . "</span>"; ?>';
        });
    }
}
