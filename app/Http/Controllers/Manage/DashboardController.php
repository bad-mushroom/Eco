<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Story;
use App\Models\Tag;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Show the Dashboard.
     */
    public function index()
    {
        $totals = [
            'comments' => Comment::where('is_approved')->count(),
            'stories'  => Story::count(),
            'tags'     => Tag::count(),
        ];

        $recentStories = Story::orderByDesc('created_at')->take(5)->get();

        return View::make('manage.pages.dashboard')
            ->with('totals', $totals)
            ->with('recentStories', $recentStories);
    }
}
