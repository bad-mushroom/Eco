<?php

namespace App\Http\ViewComposers;

use App\Models\ContentType;
use App\Models\SettingType;
use Illuminate\View\View;

class SidebarViewComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('contentTypes', ContentType::all());
        $view->with('settingTypes', SettingType::orderBy('label')->get());
    }
}
