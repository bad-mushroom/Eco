<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\Story;
use Illuminate\Http\Request;
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

        return View::make('manage.pages.stories')
            ->with('breadcrumbs', $breadcrumbs);
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
            ->with('story', $story);
    }

    /**
     * Show the create story view.
     */
    public function create()
    {
        $breadcrumbs = [
            'crumbs' => [
                ['label' => 'Stories', 'route' => 'manage.stories.index']
            ],
            'current' => 'Create Story'
        ];

        return View::make('manage.pages.stories.create')
            ->with('breadcrumbs', $breadcrumbs);
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
}
