<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class SettingsController extends Controller
{
    /**
     * Show all the settings.
     *
     * @param string $type
     */
    public function index(string $type)
    {
        $settings = Setting::query()
            ->whereHas('type', function($query) use ($type) {
                return $query->where('slug', $type);
            })
            ->paginate();

        $settingType = $settings->first()->type;

        $breadcrumbs = [
            'crumbs' => [],
            'current' => $settingType->label . ' Settings',
        ];

        return View::make('manage.pages.settings')
            ->with('settings', $settings)
            ->with('breadcrumbs', $breadcrumbs)
            ->with('settingType', $settingType);
    }

    /**
     * Update the settings.
     */
    public function update()
    {
        foreach ($this->request->all() as $setting => $value) {
            Setting::query()
                ->where('slug', $setting)
                ->update(['value' => $value]);
        }

        Cache::forget('settings');

        return Redirect::back()
            ->with('success', 'Your settings have been saved.');
    }
}
