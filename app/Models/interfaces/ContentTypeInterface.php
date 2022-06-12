<?php

namespace App\Models\Interfaces;

use Illuminate\Contracts\Validation\Validator;

interface ContentTypeInterface
{
    /**
     * Validate the content type's data.
     */
    public function validate(array $input): Validator;

    public function rules(): array;
}
