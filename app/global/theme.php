<?php

use App\Models\Story;
use App\Models\StoryType;
use App\Models\StoryTypes\Page;
use App\Models\Tag;
use App\Services\Settings\Facades\Setting;

/**
 * setting()
 *
 * @param string $setting
 * @param ?string $default
 *
 * Use `setting()` to get an Eco settings value. You can pass a default
 * value as the second argument that will be returned if the setting doesn't exist.
 *
 * Example: setting('site_title')
 * Example: setting('site_title', 'My Default Site Title')
 */
if (!function_exists('setting')) {
    function setting(string $setting, ?string $default = null)
    {
        return Setting::get($setting, $default);
    }
}

/**
 * pages()
 *
 * Get all published pages.
 */
if (!function_exists('pages')) {
    function pages()
    {
        return Page::onlyPages()->published()->get();
    }
}

/**
 * page()
 *
 * @param string $page_slug
 *
 * Get all published pages.
 *
 * Example: page('about)
 */
if (!function_exists('page')) {
    function page(string $page_slug)
    {
        return Page::where('slug', $page_slug)->first();
    }
}

/**
 * tags()
 *
 * Get all tags.
 */
if (!function_exists('tags')) {
    function tags()
    {
        return Tag::all();
    }
}

/**
 * story_types()
 *
 * Get all story types.
 */
if (!function_exists('story_types')) {
    function story_types()
    {
        return StoryType::all();
    }
}

/**
 * stories()
 *
 * Get all stories, paginated.
 */
if (!function_exists('stories')) {
    function stories()
    {
        return Story::paginate();
    }
}

/**
 * featured_stories()
 *
 * Get all featured stories, unpaginated.
 */
if (!function_exists('featured_stories')) {
    function featured_stories()
    {
        return Story::featured()->get();
    }
}
