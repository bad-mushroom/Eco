<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Story;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\View;

class CommentsController extends Controller
{
    /**
     * Show all comments for a story.
     *
     * @param Story $story
     */
    public function index(Story $story)
    {
        return View::make('admin.pages.comments.index')
            ->with('comments', $story->comments()->paginate())
            ->with('story', $story);
    }

    /**
     * Approve a comment.
     *
     * @param Story $story
     * @param Comment $comment
     */
    public function approve(Story $story, Comment $comment)
    {
        $comment->is_approved = true;
        $comment->save();

        return Redirect::back()
            ->with('success', 'The comment has been approved.');
    }

    /**
     * Disapprove a comment.
     *
     * @param Story $story
     * @param Comment $comment
     */
    public function disapprove(Story $story, Comment $comment)
    {
        $comment->is_approved = false;
        $comment->save();

        return Redirect::back()
            ->with('success', 'The comment has been disapproved and will no longer appear.');
    }

    /**
     * Delete a comment.
     *
     * @param Story $story
     * @param Comment $comment
     */
    public function destroy(Story $story, Comment $comment)
    {
        $comment->delete();

        return Redirect::route('admin.comments.index', $story)
            ->with('success', 'The comment has been deleted.');
    }
}
