<?php

namespace App\Http\Livewire;

use App\Models\Content;
use App\Services\Settings\Facades\Setting;
use Livewire\Component;
use Livewire\WithPagination;

class ShowPosts extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return view('livewire.show_posts')
            ->with('posts', Content::whereNull('is_featured')->paginate(Setting::get('posts_per_page')))
            ->with('featured', Content::where('is_featured', true)->first());
    }
}
