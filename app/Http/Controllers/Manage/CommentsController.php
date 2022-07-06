<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Story;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class CommentsController extends Controller
{
    /**
     * Show all comments for a story.
     *
     * @param Story $story
     */
    public function index(Request $request)
    {
        $breadcrumbs = [
            'crumbs' => [],
            'current' => 'All Comments'
        ];

        $comments = Comment::query();

        if ($request->has('story')) {
            $comments->where('commentable_id', $request->input('story'));
        }

        return View::make('manage.pages.comments')
            ->with('breadcrumbs', $breadcrumbs)
            ->with('comments', $comments->paginate());
    }
}
