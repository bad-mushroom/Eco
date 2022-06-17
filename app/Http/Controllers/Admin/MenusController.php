<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Menu;
use Illuminate\Support\Facades\View;

class MenusController extends Controller
{
    /**
     * Show all menus.
     *
     */
    public function index()
    {
        return View::make('admin.pages.menus.index');
    }

    /**
     * Edit a menu.
     *
     * @param string $menuId
     */
    public function edit(string $menuId)
    {
        $menu = Menu::query()
            ->with('items')
            ->where('id', $menuId)
            ->first();

        return View::make('admin.pages.menus.edit')
            ->with('menu', $menu);
    }

    /**
     * Show the create menu view.
     */
    public function create()
    {
        return View::make('admin.pages.menus.create');
    }

    /**
     * Show a menu.
     *
     * @param  string $menuId
     */
    public function show(string $menuId)
    {
        return $this->edit($menuId);
    }
}
