<?php

namespace App\Http\Livewire;

use App\Models\Story;
use App\Models\StoryType;
use Carbon\Carbon;
use Illuminate\Support\Facades\View;
use Livewire\Component;
use Illuminate\Support\Str;

class StoryFormEdit extends Component
{
    public string $type;
    public string $subject;
    public string $summary;
    public string $body;

    protected function rules()
    {
        $model = Str::ucfirst($this->type);
        $storyClass = 'App\Models\StoryTypes\\' . $model;
        return $storyClass::rules();
    }

    public function mount()
    {
        $this->type = 'post';
        $this->subject = '';
        $this->summary = '';
        $this->body = '';
        $this->user_id = auth()->user()->id ?? '79ef60bb-dac4-45c4-bb43-ad2089c2f95e';
    }

    public function clearForm()
    {
        $this->type = 'post';
        $this->subject = '';
        $this->summary = '';
        $this->body = '';
        $this->user_id = null;
    }

    public function render()
    {
        return View::make('manage.livewire.story-form')
            ->with('error', $this->getErrorBag()->count() ? 'Something went wrong! Check the form and try again.' : null)
            ->with('type', $this->type);
    }

    public function saveDraft()
    {
        $validatedData = $this->validate();
        $validatedData['published_at'] = null;

        return $this->saveStory($validatedData);
    }

    public function publish()
    {
        $validatedData = $this->validate();
        $validatedData['published_at'] = Carbon::now();

        return $this->saveStory($validatedData);
    }

    protected function saveStory(array $data)
    {
        $data['story_type_id'] = StoryType::where('slug', $this->type)->first()->id;

        $story = Story::updateOrCreate($data);

        $this->clearForm();

        session()->flash('success', $story->subject . ' has been saved.');

        return redirect()
            ->route('manage.stories.edit', $story->id);
    }
}
