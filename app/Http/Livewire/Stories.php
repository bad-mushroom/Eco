<?php

namespace App\Http\Livewire;

use App\Models\Story;
use Illuminate\Support\Facades\View;
use Livewire\Component;
use Livewire\WithPagination;

class Stories extends Component
{
    use WithPagination;

    public string $status;
    public string $type;
    public string $perPage;
    public string $sort;

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->type = '';
        $this->status = '';
        $this->sort = '';
        $this->perPage = '15';
    }

    public function render()
    {
        $query = Story::query()
            ->withCount('comments')
            ->notPages()
            ->when($this->type, function ($query) {
                return $query->whereHas('type', function ($query) {
                    return $query->where('slug', $this->type);
                });
            })
            ->when($this->status, function ($query) {
                if ($this->status == 'draft') {
                    return $query->whereNull('published_at');
                } elseif ($this->status == 'published') {
                    return $query->whereNotNull('published_at');
                } else {
                    return $query->whereNotNull('published_at')
                        ->orWhereNull('published_at');
                }
            })
            ->when($this->sort, function ($query) {
                if (str_contains($this->sort, '_desc')) {
                    $sort = str_replace('_desc', '', $this->sort);
                    return $query->orderByDesc($sort);
                } else {
                    return $query->orderBy($this->sort);
                }

            });

        return View::make('manage.livewire.stories')
            ->with('stories', $query->paginate($this->perPage));
    }

}
