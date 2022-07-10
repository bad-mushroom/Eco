<?php

namespace App\Http\ViewComposers;

use App\Models\Menu;
use App\Models\Story;
use App\Models\StoryType;
use App\Models\Tag;
use App\Services\Settings\Facades\Setting;
use Illuminate\View\View;
use Illuminate\Support\Str;

class AppViewComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $view->with('tags', Tag::all());
        $view->with('pages', Story::byType('page')->get());
        $view->with('storyTypes', StoryType::withCount('stories')->get());

        $view->with('site_title', Setting::get('site_title'));

        $view->with('site_headline', Setting::get('site_headline'));
        $view->with('site_description', Setting::get('site_description'));
    }
}
