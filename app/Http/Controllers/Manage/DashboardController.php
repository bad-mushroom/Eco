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
            'stories'  => Story::whereNull('published_at')->count(),
        ];

        return View::make('manage.pages.dashboard')
            ->with('totals', $totals);
    }
}
