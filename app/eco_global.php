<?php

use App\Models\StoryTypes\Page;
use App\Services\Settings\Facades\Setting;

/**
 * Theme Directory
 */
if (!function_exists('theme_path')) {
    function theme_path($path = '')
    {
        return storage_path('eco/themes') . ($path != '' ? DIRECTORY_SEPARATOR . $path : '');
    }
}

/**
 * Content Directory
 */
if (!function_exists('content_path')) {
    function content_path($path = '')
    {
        return storage_path('eco/content') . ($path != '' ? DIRECTORY_SEPARATOR . $path : '');
    }
}



if (!function_exists('setting')) {
    function setting(string $setting, ?string $default = null)
    {
        return Setting::get($setting, $default);
    }
}

if (!function_exists('pages')) {
    function pages()
    {
        return Page::published()->get();
    }
}
