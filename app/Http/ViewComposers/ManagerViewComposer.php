<?php

namespace App\Http\ViewComposers;

use App\Models\StoryType;
use App\Models\SettingType;
use App\Services\Settings\Facades\Setting;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Cache;
use Illuminate\View\View;

class ManagerViewComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('storyTypes', StoryType::withCount('stories')->get());
        $view->with('settingTypes', $this->getSettingTypes());

        $view->with('site_title', Setting::get('site_title'));
    }

    protected function getSettingTypes(): Collection
    {
        return Cache::remember('settingTypes', 60 * 60 * 8, function() {
            return SettingType::orderBy('label')->get();
        });
    }
}
