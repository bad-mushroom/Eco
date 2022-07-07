<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\View;
use Livewire\Component;

class StoryForm extends Component
{
    public string $type;
    public string $subject;
    public string $summary;
    public string $body;

    public function mount()
    {
        $this->type = 'post';
        $this->subject = '';
        $this->summary = '';
        $this->body = '';
    }

    public function render()
    {
        return View::make('manage.livewire.story-form')
            ->with('type', $this->type);
    }

    public function saveDraft()
    {
        logger($this->subject);
    }
}
