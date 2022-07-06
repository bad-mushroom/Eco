<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Story;
use Illuminate\Support\Facades\View;
use Livewire\Component;
use Livewire\WithPagination;

class Comments extends Component
{
    use WithPagination;

    public string $status;
    public string $perPage;
    public string $sort;

    protected $paginationTheme = 'bootstrap';

    public function mount()
    {
        $this->status = '';
        $this->sort = '';
        $this->perPage = '15';
    }

    public function render()
    {
        $query = Comment::query()
            ->when($this->status, function ($query) {
                if ($this->status == 'pending') {
                    return $query->whereNull('is_approved');
                } elseif ($this->status == 'approved') {
                    return $query->whereNotNull('is_approved');
                } else {
                    return $query->whereNotNull('is_approved')
                    ->orWhereNull('is_approved');
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

        return View::make('livewire.comments')
            ->with('comments', $query->paginate($this->perPage));
    }
}
