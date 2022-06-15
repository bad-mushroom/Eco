<?php

namespace App\Models\Interfaces;

use Illuminate\Contracts\Validation\Validator;

interface StoryTypeInterface
{
    /**
     * Validate the story type's data.
     */
    public function validate(array $input): Validator;

    public function rules(): array;
}
