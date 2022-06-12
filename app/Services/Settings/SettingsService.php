<?php

namespace App\Services\Settings;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;

class SettingsService
{
    public function get(string $settingSlug)
    {
        $settings = $this->all();
        $setting = $settings->first(fn ($setting) => $setting->slug == $settingSlug);
    }

    public function all()
    {
        return Cache::remember('settings', 60 * 60 * 8, function() {
            return Setting::all();
        });
    }
}
