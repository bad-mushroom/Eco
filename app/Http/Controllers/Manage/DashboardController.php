<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Story;
use Illuminate\Support\Facades\View;

class DashboardController extends Controller
{
    /**
     * Show the Dashboard.
     */
    public function index()
    {
        $totals = [
            'comments' => Comment::where('is_approved', false)->count(),
            'stories_draft'  => Story::whereNull('published_at')->count(),
            'stories_total'  => Story::count(),
        ];

        return View::make('manage.pages.dashboard')
            ->with('stories', Story::orderByDesc('created_at')->limit(5)->get())
            ->with('totals', $totals);
    }
}
