<?php

namespace App\Http\Livewire;

use App\Models\Menu;
use Livewire\Component;
use Livewire\WithPagination;

class Menus extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $menus = Menu::query()
            ->withCount('items')
            ->paginate(15);

        return view('livewire.menus')
            ->with('menus', $menus);
    }
}
