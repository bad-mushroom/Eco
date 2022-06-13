<?php

namespace App\Models\ContentTypes;

use App\Models\Content;
use App\Models\Interfaces\ContentTypeInterface;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Validator as ValidatorFacade;

class Note extends Content implements ContentTypeInterface
{
    public $table = 'contents';

    public function rules(): array
    {
        return [
            'subject' => ['required', 'max:255'],
            'body' => ['required'],
            'user_id' => ['required']
        ];
    }

    /**
     * Validate the content type's data.
     */
    public function validate(array $input): Validator
    {
        return ValidatorFacade::make($input, $this->rules());
    }
}
