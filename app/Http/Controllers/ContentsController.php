<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentsController extends Controller
{
    public function index(Request $request)
    {
        $contents = Content::all();

        return view('contents')
            ->with('contents', $contents);
    }
}
