<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentsController extends Controller
{
    public function index(Request $request)
    {
        $contents = Content::query()
            ->with(['author:id,name', 'type:label,slug', 'comments', 'tags'])
            ->get();

        return view('home')
            ->with('contents', $contents);
    }
}
