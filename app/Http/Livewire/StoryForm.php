<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\View;
use Livewire\Component;

class StoryForm extends Component
{
    public string $type;

    public function mount()
    {
        $this->type = 'post';
    }

    public function render()
    {
        return View::make('manage.livewire.story-form')
            ->with('type', $this->type);
    }
}
