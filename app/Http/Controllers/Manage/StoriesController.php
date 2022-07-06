<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\Story;
use App\Models\StoryType;
use App\Services\StoryTypes\Facades\Type;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class StoriesController extends Controller
{
    /**
     * Show all stories.
     */
    public function index(Request $request)
    {
        $breadcrumbs = [
            'crumbs' => [],
            'current' => 'All Stories'
        ];

        $stories = Story::query()
            ->notPages()
            ->search($request->input('search'))
            ->byType($request->input('type') ?? '*')
            ->withCount('comments')
            ->with(['author:id,name,avatar', 'type'])
            ->orderByDesc('updated_at')
            ->paginate(15);

        return View::make('manage.pages.stories')
            ->with('breadcrumbs', $breadcrumbs)
            ->with('stories', $stories);
    }

    /**
     * Show the edit view for the story.
     *
     * @param string $storyId
     */
    public function edit(string $storyId)
    {
        $story = Story::query()
            ->where('id', $storyId)
            ->with(['tags', 'author', 'type'])
            ->withCount('comments')
            ->first();

        $breadcrumbs = [
            'crumbs' => [
                ['label' => 'Stories', 'route' => 'manage.stories.index']
            ],
            'current' => 'Edit Story'
        ];

        return View::make('manage.pages.stories.edit')
            ->with('breadcrumbs', $breadcrumbs)
            ->with('selectedType', $story->type)
            ->with('story', $story);
    }

    /**
     * Show the create story view.
     */
    public function create()
    {
        $selectedType = $this->request->has('type') && $this->request->get('type') !== '*'
            ? StoryType::where('slug', $this->request->get('type'))->first()
            : null;

        $breadcrumbs = [
            'crumbs' => [
                ['label' => 'Stories', 'route' => 'manage.stories.index']
            ],
            'current' => 'Create Story'
        ];

        return View::make('manage.pages.stories.create')
            ->with('breadcrumbs', $breadcrumbs)
            ->with('selectedType', $selectedType);
    }

    /**
     * Show the "show" story view.
     *
     * @param string $storyId
     */
    public function show(string $storyId)
    {
        return $this->edit($storyId);
    }

    /**
     * Update the story.
     *
     * @param Story $story
     */
    public function update(Story $story)
    {
        $data = Type::fetch($story->type->slug)->validate($this->request->all());

        $attributes = array_merge($data->validated(), [
            'story_type_id'  => Type::model($story->type->slug)->id,
            'published_at'   => $this->request->has('publish') ? Carbon::now() : null,
            'featured_image' => $this->request->hasFile('featured_image')
                                    ? base64_encode(file_get_contents($this->request->file('featured_image')->path()))
                                    :  null,
        ]);

        $story->update($attributes);
        $story->createAndAssociateTags(explode(',', $this->request->get('tags')));

        return Redirect::back()
            ->with('success', 'Your story has been updated.');
    }

    /**
     * Save the story
     */
    public function store()
    {
        $data = Type::fetch($this->request->get('story_type'))->validate($this->request->all());

        $attributes = array_merge($data->validated(), [
            'user_id'        => auth()->id(),
            'story_type_id'  => Type::model($this->request->get('story_type'))->id,
            'published_at'   => $this->request->has('publish') ? Carbon::now() : null,
            'featured_image' => $this->request->hasFile('featured_image')
                                    ? base64_encode(file_get_contents($this->request->file('featured_image')->path()))
                                    :  null,
        ]);

        $story = Story::create($attributes);
        $story->createAndAssociateTags(explode(',', $this->request->get('tags')));

        return Redirect::route('manage.stories.edit', $story->id)
            ->with('success', 'Your story has been added.');
    }

    /**
     * Delete the story
     *
     * @param  mixed $story
     * @return void
     */
    public function delete(Story $story)
    {
        $story->delete();

        return Redirect::route('manage.stories.index')
            ->with('success', 'Your story has been deleted.');
    }
}
