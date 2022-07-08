<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\View;

class PluginsController extends Controller
{
    public function index()
    {
        $breadcrumbs = [
            'crumbs' => [],
            'current' => 'Plugins',
        ];

        return View::make('manage.pages.plugins')
            ->with('plugins', [])
            ->with('breadcrumbs', $breadcrumbs);
    }
}
