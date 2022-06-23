<?php

namespace App\Http\ViewComposers;

use App\Services\Settings\Facades\Setting;
use Illuminate\Support\Facades\Storage;
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
        $theme = Setting::get('theme');
        $css = '';

        foreach (Storage::disk('themes')->allFiles($theme . '/css') as $file) {
            if (str_ends_with($file, '.css')) {
                $css .= Storage::disk('themes')->get($file);
            }
        }

        $view->with('css', $css);
    }

}
