<?php

namespace App\Http\ViewComposers;

use App\Models\ContentType;
use App\Models\SettingType;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
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
        $view->with('contentTypes', ContentType::withCount('contents')->get());
        $view->with('settingTypes', $this->getSettingTypes());
    }

    protected function getSettingTypes(): Collection
    {
        return Cache::remember('settingTypes', 60 * 60 * 8, function() {
            return SettingType::orderBy('label')->get();
        });
    }
}
