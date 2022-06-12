<?php

namespace App\Http\ViewComposers;

use App\Models\Menu;
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
        $view->with('tags', Tag::all());
        $this->registerMenus($view);

        $view->with('site_title', Setting::get('site_title'));
        $view->with('site_headline', Setting::get('site_headline'));
    }

    protected function registerMenus(View $view)
    {
        foreach (Menu::with('items')->get() as $menu) {
            $label = 'menu' . Str::ucfirst($menu->slug);
            $view->with($label, $menu->items);
        }
    }
}
