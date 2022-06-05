<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;
use Qirolab\Theme\Theme;
class HomeController extends Controller
{
    public function index(Request $request)
    {
        return view('home');
    }
}
