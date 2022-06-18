<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\Story;
use Illuminate\Support\Facades\View;

class CommentsController extends Controller
{
    /**
     * Show all comments for a story.
     *
     * @param Story $story
     */
    public function index()
    {
        return View::make('manage.pages.comments.index');
    }
}
