<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Tag;
use Illuminate\Http\Request;

class ContentsController extends Controller
{
    public function index(Request $request)
    {
        $contents = Content::query()
            ->with(['author:id,name', 'type:label,slug', 'tags:label,slug'])
            ->withCount('comments')
            ->get();

        return view('home')
            ->with('contents', $contents);
    }

    public function show(Request $request, string $slug)
    {
        $content = Content::query()
            ->with(['author:id,name', 'type:label,slug', 'comments', 'tags:label,slug'])
            ->where('slug', $slug)
            ->first();

        return view('pages.content_show')
            ->with('content', $content);
    }
}
