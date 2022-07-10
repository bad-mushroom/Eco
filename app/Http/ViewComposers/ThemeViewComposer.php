<?php

namespace App\Http\ViewComposers;

use App\Services\Settings\Facades\Setting;
use Illuminate\View\View;

class ThemeViewComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('site_headline', Setting::get('site_headline'));
        $view->with('site_description', Setting::get('site_description'));
    }

}
