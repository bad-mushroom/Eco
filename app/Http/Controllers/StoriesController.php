<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Services\Settings\Facades\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class StoriesController extends Controller
{
    public function index(Request $request)
    {
        $stories = Story::query()
            ->search($request->get('search'))
            ->published()
            ->notFeatured()
            ->notPages()
            ->with('type')
            ->byType($request->get('type') ?? '*')
            ->byTag($request->get('tag') ?? '*')
            ->orderByDesc('published_at')
            ->paginate(Setting::get('posts_per_page'));

        return View::make('home')
            ->with('stories', $stories)
            ->with('featuredStories', Story::where('is_featured', true)->with('type')->get())
            ->with('filterTag', $request->get('tag'))
            ->with('filterSearch', $request->get('search'))
            ->with('filterType', $request->get('type'));
    }

    public function show(Request $request, string $storyTypeSlug, string $storySlug)
    {
        $story = Story::query()
            ->with(['author:id,name', 'type', 'comments', 'tags:label,slug'])
            ->where('slug', $storySlug)
            ->forType($storyTypeSlug)
            ->first();

        return view('story')
            ->with('story', $story)
            ->with('comments', $story->comments);
    }
}
