<?php

namespace App\Models\StoryTypes;

use App\Models\Story;
use App\Models\Interfaces\StoryTypeInterface;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Validator as ValidatorFacade;

class Note extends Story implements StoryTypeInterface
{
    public $table = 'stories';

    /**
     * @inherit
     */
    public static function rules(): array
    {
        return [
            'subject' => ['required', 'max:255'],
            'summary' => ['required'],
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

    /**
     * Called before a Story is saved.
     *
     * @param Story $story
     */
    public function onSaving(Story $story)
    {
        //
    }

    /**
     * Called after a Story is saved.
     *
     * @param Story $story
     */
    public function onSaved(Story $story)
    {
        //
    }
}
