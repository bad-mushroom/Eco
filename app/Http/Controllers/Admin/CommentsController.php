<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Content;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function index(Request $request, Content $content)
    {

        return view('admin.pages.comments.index')
            ->with('comments', $content->comments()->paginate(15))
            ->with('content', $content);
    }
}
