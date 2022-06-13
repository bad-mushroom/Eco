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
        $contents = Content::query()
            ->published()
            ->notFeatured()
            ->with('type')
            ->orderByDesc('published_at')
            ->paginate(Setting::get('posts_per_page'));

        return view('livewire.show_posts')
            ->with('contents', $contents)
            ->with('featured', Content::where('is_featured', true)->with('type')->first());
    }
}
