<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Story;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $totals = [
            'comments' => Comment::where('is_approved')->count(),
            'stories'  => Story::count(),
            'tags'     => Tag::count(),
        ];

        $recentStories = Story::orderByDesc('created_at')->take(5)->get();

        return view('admin.pages.dashboard')
            ->with('totals', $totals)
            ->with('recentStories', $recentStories);
    }
}
