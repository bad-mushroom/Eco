<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Http\Request;

class MenusController extends Controller
{
    public function index(Request $request)
    {
        $menus = Menu::query()
            ->withCount('items')
            ->paginate(15);

        return view('admin.pages.menus.index')
            ->with('menus', $menus);
    }

    public function edit(Request $request, string $menuId)
    {
        $menu = Menu::query()
            ->where('id', $menuId)
            ->first();

        return view('admin.pages.menus.edit')
            ->with('menu', $menu);
    }

    public function create(Request $request)
    {
        return view('admin.pages.menus.create');
    }

    public function show(Request $request, string $menuId)
    {
        return $this->edit($request, $menuId);
    }
}
