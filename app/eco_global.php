<?php

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
