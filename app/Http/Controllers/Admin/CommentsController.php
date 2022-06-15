<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
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
}
