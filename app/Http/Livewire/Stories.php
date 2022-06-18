<?php

namespace App\Http\Livewire;

use App\Models\Story;
use App\Models\StoryType;
use Illuminate\Support\Facades\View;
use Livewire\Component;
use Livewire\WithPagination;

class Stories extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $stories = Story::query()
            ->search($this->request->get('search'))
            ->byType($this->request->get('type') ?? '*')
            ->notPages()
            ->withCount('comments')
            ->with(['author:id,name', 'type'])
            ->orderByDesc('updated_at')
            ->paginate(15);

        $selectedType = $this->request->has('type') && $this->request->get('type') !== '*'
            ? StoryType::where('slug', $this->request->get('type'))->first()
            : null;

        return View::make('livewire.stories')
            ->with('selectedType', $selectedType)
            ->with('stories', $stories);
    }
}
