<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Story;
use Illuminate\Http\Request;

class CommentsController extends Controller
{
    public function store(Request $request, Story $story)
    {
        $payload = array_merge(['session' => session()->getId()], $request->all());
        $story->comments()->create($payload);

        return redirect()->back();
    }

}
