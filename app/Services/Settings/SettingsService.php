<?php

namespace App\Services\Settings;

use App\Models\Setting;

class SettingsService
{
    public function get(string $settingSlug)
    {
        $setting = Setting::query()
            ->where('slug', $settingSlug)
            ->first();

        return empty($setting)
            ? null
            : $setting->value;
    }

    public function all()
    {
        return Setting::all();
    }
}
