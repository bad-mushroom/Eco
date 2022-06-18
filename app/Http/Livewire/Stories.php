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

    public $search = '';
    public $type = '*';

    protected $paginationTheme = 'bootstrap';

    protected $queryString = [
        'search' => ['except' => ''],
        'type'   => ['except' => ''],
    ];

    public function render()
    {
        $stories = Story::query()
            ->search($this->search)
            ->byType($this->type ?? '*')
            ->notPages()
            ->withCount('comments')
            ->with(['author:id,name', 'type'])
            ->orderByDesc('updated_at')
            ->paginate(15);

        $selectedType = $this->type && $this->type !== '*'
            ? StoryType::where('slug', $this->type)->first()
            : null;

        return View::make('livewire.stories')
            ->with('selectedType', $selectedType)
            ->with('stories', $stories);
    }
}
