<?php

namespace App\Http\Controllers;

use App\Models\Story;
use Illuminate\Http\Request;

class StoriesController extends Controller
{
    public function index(Request $request)
    {
        $stories = Story::query()
            ->with(['author:id,name', 'type:label,slug', 'tags:label,slug'])
            ->withCount('comments')
            ->get();

        return view('home')
            ->with('stories', $stories);
    }

    public function show(Request $request, string $storyTypeSlug, string $storySlug)
    {
        $Story = Story::query()
            ->with(['author:id,name', 'type:label,slug', 'comments', 'tags:label,slug'])
            ->where('slug', $storySlug)
            ->forType($storyTypeSlug)
            ->first();

        return view('pages.story')
            ->with('story', $story);
    }
}
