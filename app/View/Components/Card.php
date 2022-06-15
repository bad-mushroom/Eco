<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Card extends Component
{

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(
        public string $header = '',
        public string $body = '',
        public string $footer = '',
    )
    {
    }

    /**
     * Get the view / stories that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.card');
    }
}
