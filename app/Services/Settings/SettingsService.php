<?php

namespace App\Services\Settings;

use App\Models\Setting;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Log;

class SettingsService
{
    public function get(string $settingSlug, $default = null)
    {
        try {
            $settings = $this->all();
            $setting = $settings->first(fn ($setting) => $setting->slug == $settingSlug);

            return ($setting) ? $setting->value : $default;
        } catch (\Exception $e) {
            Log::warning($e->getMessage());
            return null;
        }
    }

    public function all()
    {
        return Cache::remember('settings', 60 * 60 * 8, function() {
            return Setting::all();
        });
    }
}
