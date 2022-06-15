<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Story;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index(Request $request, Story $story)
    {

        return view('admin.pages.comments.index')
            ->with('comments', $story->comments()->paginate(15))
            ->with('story', $story);
    }

    public function approve(Request $request, Story $story, Comment $comment)
    {
        $comment->is_approved = true;
        $comment->save();

        return redirect()->back()->with('success', 'The comment has been approved.');
    }

    public function disapprove(Request $request, Story $story, Comment $comment)
    {
        $comment->is_approved = false;
        $comment->save();

        return redirect()->back()->with('success', 'The comment has been disapproved and will no longer appear.');
    }

    public function destroy(Request $request, Story $story, Comment $comment)
    {
        $comment->delete();

        return redirect()->route('admin.comments.index', $story)->with('success', 'The comment has been deleted.');
    }
}
