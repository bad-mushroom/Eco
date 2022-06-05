<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentsController extends Controller
{
    public function index(Request $request)
    {
        $contents = Content::query()
            ->with(['author:id,name', 'type:label,slug', 'commentable'])
            ->get();

        return view('contents')
            ->with('contents', $contents);
    }
}
