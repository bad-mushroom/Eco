<?php

namespace App\Models\StoryTypes;

use App\Models\Story;
use App\Models\Interfaces\StoryTypeInterface;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Validator as ValidatorFacade;

class Bookmark extends Story implements StoryTypeInterface
{
    public $table = 'stories';

    public function rules(): array
    {
        return [
            'subject' => ['sometimes', 'max:255', 'url'],
            'user_id' => ['required']
        ];
    }

    /**
     * Validate the story type's data.
     */
    public function validate(array $input): Validator
    {
        return ValidatorFacade::make($input, $this->rules());
    }

    public function onSaving(Story $story)
    {
        //
    }

    public function onSaved(Story $story)
    {
        //
    }
}
