<?php

namespace App\Providers;

use App\Http\ViewComposers;
use App\Http\ViewComposers\SidebarViewComposer;
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
        View::composer(['*.layout'], ViewComposers\AppViewComposer::class);
        View::composer('partials.widgetbar', SidebarViewComposer::class);

        Blade::directive('author', function ($story) {
            return '<?php echo "<span class=\"h-card p-author\">" . with($story)->author->name . "</span>"; ?>';
        });
    }
}
