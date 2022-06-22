<?php

/**
 * Theme Directory
 */
if (!function_exists('theme_path')) {
    function theme_path($path = '')
    {
        return app_path('../' . env('THEMES_PATH')) . ($path != '' ? DIRECTORY_SEPARATOR . $path : '');
    }
}

/**
 * Content Directory
 */
if (!function_exists('content_path')) {
    function content_path($path = '')
    {
        return app_path('../' . env('CONTENT_PATH')) . ($path != '' ? DIRECTORY_SEPARATOR . $path : '');
    }
}
