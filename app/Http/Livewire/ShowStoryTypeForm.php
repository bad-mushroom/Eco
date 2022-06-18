<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowStoryTypeForm extends Component
{
    /**
     * The value here will need to corespond to a blade partial in
     * `resources/views/manage/partials/story_types`.
     *
     * Example: `resources/views/manage/partials/story_types/post.blade.php`
     */
    public $selectedStoryType;

    public function mount($defaultType = null, $story = null)
    {
        $this->selectedStoryType = $defaultType;
        $this->story = $story;
    }

    public function render()
    {
        return view('livewire.story-type-form')
            ->with('type', $this->selectedStoryType)
            ->with('story', $this->story);
    }
}
