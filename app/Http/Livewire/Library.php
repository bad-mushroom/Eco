<?php

namespace App\Http\Livewire;

use App\Models\File;
use Illuminate\Support\Facades\View;
use Livewire\Component;
use Livewire\WithPagination;

class Library extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        return View::make('livewire.library')
            ->with('files', File::paginate(25));
    }
}
