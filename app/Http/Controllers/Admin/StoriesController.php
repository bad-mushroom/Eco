<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Story;
use App\Models\StoryType;
use App\Services\StoryTypes\Facades\Type;
use Carbon\Carbon;
use Illuminate\Http\Request;

class StoriesController extends Controller
{
    public function index(Request $request)
    {
        $stories = Story::query()
            ->byType($request->get('type') ?? '*')
            ->notPages()
            ->withCount('comments')
            ->with(['author:id,name', 'type'])
            ->orderByDesc('updated_at')
            ->paginate(15);

        $selectedType = $request->has('type') && $request->get('type') !== '*'
            ? StoryType::where('slug', $request->get('type'))->first()
            : null;

        return view('admin.pages.stories.index')
            ->with('selectedType', $selectedType)
            ->with('stories', $stories);
    }

    public function edit(Request $request, string $storyId)
    {
        $story = Story::query()
            ->where('id', $storyId)
            ->with(['tags', 'author', 'type'])
            ->withCount('comments')
            ->first();

        return view('admin.pages.stories.edit')
            ->with('selectedType', $story->type)
            ->with('story', $story);
    }

    public function create(Request $request)
    {
        $selectedType = $request->has('type') && $request->get('type') !== '*'
            ? StoryType::where('slug', $request->get('type'))->first()
            : null;

        return view('admin.pages.stories.create')
            ->with('selectedType', $selectedType);
    }

    public function show(Request $request, string $storyId)
    {
        return $this->edit($request, $storyId);
    }

    public function update(Request $request, Story $story)
    {
        $data = Type::fetch($story->type->slug)->validate($request->all());

        $attributes = array_merge([
            'story_type_id' => Type::model($story->type->slug)->id,
            'published_at'    => $request->has('publish') ? Carbon::now() : null,
            'featured_image'  => $request->hasFile('featured_image') ? base64_encode(file_get_stories($request->file('featured_image')->path())) : null,

        ], $data->validated());

        $story->update($attributes);
        $story->createAndAssociateTags(explode(',', $request->get('tags')));

        return redirect()
            ->back()
            ->with('success', 'Your story has been updated.');
    }

    public function store(Request $request)
    {
        $data = Type::fetch($request->get('story_type'))->validate($request->all());

        $attributes = array_merge([
            'story_type_id' => Type::model($request->get('story_type'))->id,
            'published_at'    => $request->has('publish') ? Carbon::now() : null,
            'featured_image'  => $request->hasFile('featured_image') ? base64_encode(file_get_stories($request->file('featured_image')->path())) : null,
        ], $data->validated());

        $story = Story::create($attributes);
        $story->createAndAssociateTags(explode(',', $request->get('tags')));

        return redirect()
            ->route('admin.stories.edit', $story->id)
            ->with('success', 'Your story has been added.');
    }

    public function delete(Story $story)
    {
        $story->delete();

        return redirect()
            ->route('admin.stories.index')
            ->with('success', 'Your story has been deleted.');
    }
}
