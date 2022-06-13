<?php

namespace App\Models\ContentTypes;

use App\Models\Content;
use App\Models\Interfaces\ContentTypeInterface;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Support\Facades\Validator as ValidatorFacade;

class Bookmark extends Content implements ContentTypeInterface
{
    public $table = 'contents';

    public function rules(): array
    {
        return [
            'subject' => ['sometimes', 'max:255', 'url'],
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

    public function onSaving(Content $content)
    {
        //
    }

    public function onSaved(Content $content)
    {
        //
    }
}
