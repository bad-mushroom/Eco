<?php

namespace App\Models\Interfaces;

use Illuminate\Contracts\Validation\Validator;

interface StoryTypeInterface
{
    /**
     * Validate the story type's data.
     *
     * @param array $Input
     * @return Validator
     */
    public function validate(array $input): Validator;

    /**
     * Validation rules
     *
     * @return array
     */
    public static function rules(): array;
}
