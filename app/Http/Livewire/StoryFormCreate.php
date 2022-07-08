<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\StorySaveable;
use Illuminate\Support\Facades\View;
use Livewire\Component;

class StoryFormCreate extends Component
{
    use StorySaveable;

    public string $type;
    public string $subject;
    public ?string $summary;
    public ?string $body;
    public ?string $tags;
    public bool $allowComments;

    public function mount()
    {
        $this->type = 'post';
        $this->subject = '';
        $this->summary = null;
        $this->body = null;
        $this->user_id = auth()->user()->id ?? '79ef60bb-dac4-45c4-bb43-ad2089c2f95e';
        $this->tags = '';
        $this->allowComments = true;
    }

    public function render()
    {
        return View::make('manage.livewire.story-form')
            ->with('error', $this->getErrorBag()->count() ? 'Something went wrong! Check the form and try again.' : null)
            ->with('type', $this->type);
    }
}
