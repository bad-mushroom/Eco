<?php

namespace App\Http\Livewire;

use App\Http\Livewire\Traits\StorySaveable;
use App\Models\Story;
use Illuminate\Support\Facades\View;
use Livewire\Component;

class StoryFormEdit extends Component
{
    use StorySaveable;

    public string $type;
    public string $subject;
    public ?string $summary;
    public ?string $body;
    public ?string $publishedAt;
    public Story $story;
    public ?string $tags;
    public  $allowComments;

    public function mount(Story $story)
    {
        $this->tags = $story->tag ?? '';
        $this->type = $story->type->slug;
        $this->subject = $story->subject;
        $this->summary = $story->summary;
        $this->body = $story->body;
        $this->user_id = $story->user_id;
        $this->publishedAt = $story->published_at;
        $this->story = $story;
        $this->allowComments = $story->allow_comments;
    }

    public function render()
    {
        return View::make('manage.livewire.story-form-edit')
            ->with('error', $this->getErrorBag()->count() ? 'Something went wrong! Check the form and try again.' : null)
            ->with('type', $this->type);
    }

}
