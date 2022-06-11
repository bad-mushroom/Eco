<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use Illuminate\Http\Request;

class ContentsController extends Controller
{
    public function index(Request $request)
    {
        $pages = Content::query()
            ->byType($request->get('type') ?? '*')
            ->withCount('comments')
            ->with(['author:id,name', 'type'])
            ->paginate(15);

        return view('admin.content.content_index')
            ->with('pages', $pages);
    }

    public function edit(string $pageId)
    {
        $page = Content::query()
            ->where('id', $pageId)
            ->with(['tags', 'category', 'author'])
            ->first();

        return view('admin.content.content_edit')
            ->with('page', $page);
    }

    public function create()
    {
        return view('admin.content.content_create');
    }

    public function show()
    {
        return view('admin.content.content_create');
    }
}
