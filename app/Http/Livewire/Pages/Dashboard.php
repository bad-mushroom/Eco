<?php

namespace App\Http\Livewire\Pages;

use Illuminate\Support\Facades\View;
use Livewire\Component;

class Dashboard extends Component
{
    public function render()
    {
        return View::make('livewire.pages.dashboard');
    }
}
