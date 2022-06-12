<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index(Request $request)
    {
        $categories = Category::query()
            ->withCount('contents')
            ->paginate(15);

        return view('admin.pages.categories.categories_index')
            ->with('categories', $categories);
    }

    public function edit(Request $request, string $categoryId)
    {
        $category = Category::query()
            ->where('id', $categoryId)
            ->first();

        return view('admin.pages.categories.categories_edit')
            ->with('category', $category);
    }

    public function create(Request $request)
    {
        return view('admin.pages.categories.categories_create');
    }

    public function show(Request $request, string $categoryId)
    {
        return $this->edit($request, $categoryId);
    }
}
