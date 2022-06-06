<?php

namespace App\Http\Livewire;

use App\Models\Content;
use Livewire\Component;
use Livewire\WithPagination;

class ShowPosts extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.show_posts')
            ->with('posts', Content::paginate(2));
    }
}
