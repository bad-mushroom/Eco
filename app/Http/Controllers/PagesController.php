<?php

namespace App\Http\Controllers;

use App\Models\Story;
use App\Services\Settings\Facades\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PagesController extends Controller
{
    public function show(Request $request, string $pageSlug)
    {
        $story = Story::query()
            ->with(['author:id,name', 'type:label,slug', 'comments', 'tags:label,slug'])
            ->where('slug', $pageSlug)
            ->first();

        return View::make('pages.story')
            ->with('story', $story)
            ->with('comments', $story->comments);
    }
}
