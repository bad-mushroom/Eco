<?php

namespace App\Http\Livewire;

use App\Models\Story;
use App\Services\Settings\Facades\Setting;
use Livewire\Component;
use Livewire\WithPagination;

class ShowPosts extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $stories = Story::query()
            ->published()
            ->notFeatured()
            ->notPages()
            ->with('type')
            ->orderByDesc('published_at')
            ->paginate(Setting::get('posts_per_page'));

        return view('livewire.show_posts')
            ->with('stories', $stories)
            ->with('featured', Story::where('is_featured', true)->with('type')->first());
    }
}
