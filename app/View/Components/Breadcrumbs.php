<?php

namespace App\View\Components;

use Illuminate\Support\Facades\View;
use Illuminate\View\Component;

class Breadcrumbs extends Component
{

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public array $crumbs = [],
        public string $current
    )
    {
        //
    }

    /**
     * Get the view / stories that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return View::make('components.partials.breadcrumbs')
            ->with('crumbs', $this->crumbs)
            ->with('current', $this->current);
    }
}
