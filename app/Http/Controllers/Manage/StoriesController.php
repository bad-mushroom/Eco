<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\Story;
use App\Models\StoryType;
use App\Services\StoryTypes\Facades\Type;
use Carbon\Carbon;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class StoriesController extends Controller
{
    /**
     * Show all stories.
     */
    public function index()
    {
        return View::make('manage.pages.stories.index');
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

        return View::make('manage.pages.stories.edit')
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

        return View::make('manage.pages.stories.create')
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
