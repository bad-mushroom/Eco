<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\ContentType;
use Illuminate\Http\Request;

class ContentsController extends Controller
{
    public function index(Request $request)
    {
        $contents = Content::query()
            ->byType($request->get('type') ?? '*')
            ->withCount('comments')
            ->with(['author:id,name', 'type'])
            ->paginate(15);

        $selectedType = $request->has('type') && $request->get('type') !== '*'
            ? ContentType::where('slug', $request->get('type'))->first()
            : null;

        return view('admin.pages.content.content_index')
            ->with('selectedType', $selectedType)
            ->with('contents', $contents);
    }

    public function edit(Request $request, string $contentId)
    {
        $content = Content::query()
            ->where('id', $contentId)
            ->with(['tags', 'category', 'author', 'type'])
            ->first();

        return view('admin.pages.content.content_edit')
            ->with('selectedType', $content->type)
            ->with('content', $content);
    }

    public function create(Request $request)
    {
        $selectedType = $request->has('type') && $request->get('type') !== '*'
            ? ContentType::where('slug', $request->get('type'))->first()
            : null;

        return view('admin.pages.content.content_create')
            ->with('selectedType', $selectedType);
    }

    public function show(Request $request, string $contentId)
    {
        return $this->edit($request, $contentId);
    }
}
