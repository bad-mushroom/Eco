<?php

namespace App\Http\ViewComposers;

use App\Models\Menu;
use App\Models\Story;
use App\Models\Tag;
use App\Services\Settings\Facades\Setting;
use Illuminate\View\View;
use Illuminate\Support\Str;

class AppViewComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $this->registerMenus($view);

        $view->with('tags', Tag::all());
        $view->with('site_title', Setting::get('site_title'));
        $view->with('pages', Story::byType('page')->get());
        $view->with('site_headline', Setting::get('site_headline'));
    }

    /**
     * Make all menus available to the view.
     *
     * @param View $view
     * @return void
     */
    protected function registerMenus(View $view): void
    {
        foreach (Menu::with('items')->get() as $menu) {
            $label = 'menu' . Str::ucfirst($menu->slug);
            $view->with($label, $menu->items);
        }
    }
}
