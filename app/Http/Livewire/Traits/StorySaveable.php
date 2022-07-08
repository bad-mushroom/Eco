<?php

namespace App\Http\Livewire\Traits;

use App\Models\Tag;
use Carbon\Carbon;
use Illuminate\Support\Str;

trait StorySaveable
{
    protected function convertTags(string $input): array
    {
        return explode(',', $input);
    }

    protected function rules()
    {
        $model = Str::ucfirst($this->type);
        $storyClass = 'App\Models\StoryTypes\\' . $model;

        return $storyClass::rules();
    }

    public function saveDraft()
    {
        $validatedData = $this->validate();
        $validatedData['published_at'] = null;
        $validatedData['tags'] = $this->convertTags($this->tags);
        $validatedData['allow_comments'] = $this->allowComments;

        return $this->saveStory($validatedData);
    }

    public function publish()
    {
        $validatedData = $this->validate();
        $validatedData['published_at'] = Carbon::now();
        $validatedData['tags'] = $this->convertTags($this->tags);
        $validatedData['allow_comments'] = $this->allowComments;

        return $this->saveStory($validatedData);
    }

    protected function saveStory(array $data)
    {
        $this->story->update($data);

        foreach ($data['tags'] as $label) {
            $label = trim($label);

            if (!empty($label)) {
                $tag = Tag::firstOrCreate(['label' => Str::title($label)]);
                $this->story->tags()->save($tag);
            }
        }

        session()->flash('success', $this->subject . ' has been updated.');

        return redirect()
            ->route('manage.stories.index');
    }
}
