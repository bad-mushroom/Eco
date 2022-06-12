<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Content;
use App\Models\ContentType;
use App\Models\Tag;
use App\Services\ContentTypes\Facades\Type;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ContentsController extends Controller
{
    public function index(Request $request)
    {
        $contents = Content::query()
            ->byType($request->get('type') ?? '*')
            ->withCount('comments')
            ->with(['author:id,name', 'type'])
            ->orderByDesc('updated_at')
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

    public function update(Request $request, Content $content)
    {
        $data = Type::fetch($request->get('content_type'))->validate($request->all());

        $attributes = array_merge([
            'content_type_id' => Type::model($request->get('content_type'))->id,
            'is_published'    => $request->has('published') ? true : false,
            'published_at'    => $request->has('published') ? Carbon::now() : null,
        ], $data->validated());

        $content->update($attributes);
        $content->createAndAssociateTables(explode(',', $request->get('tags')));

        return redirect()
            ->back()
            ->with('success', 'Your content has been updated.');
    }

    public function store(Request $request)
    {
        $data = Type::fetch($request->get('content_type'))->validate($request->all());

        $attributes = array_merge([
            'content_type_id' => Type::model($request->get('content_type'))->id,
            'is_published'    => $request->has('published') ? true : false,
            'published_at'    => $request->has('published') ? Carbon::now() : null,
        ], $data->validated());

        $content = Content::create($attributes);
        $content->createAndAssociateTables(explode(',', $request->get('tags')));

        return redirect()
            ->route('admin.content.edit', $content->id)
            ->with('success', 'Your content has been added.');
    }

    public function delete(Content $content)
    {
        $content->delete();

        return redirect()
            ->route('admin.content.index')
            ->with('success', 'Your content has been deleted.');
    }
}
