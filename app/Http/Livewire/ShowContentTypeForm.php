<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowContentTypeForm extends Component
{
    /**
     * The value here will need to corespond to a blade partial in
     * `resources/views/admin/partials/content_types`.
     *
     * Example: `resources/views/admin/partials/content_types/post.blade.php`
     */
    public $selectedContentType;

    public function mount($defaultType = null)
    {logger($defaultType);
        $this->selectedContentType = $defaultType;
    }

    public function render()
    {
        return view('livewire.content-type-form')
            ->with('type', $this->selectedContentType);
    }
}
