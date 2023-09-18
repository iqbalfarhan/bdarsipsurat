<?php

namespace App\Http\Livewire\Partial;

use Livewire\Component;

class Header extends Component
{
    public $title;
    public $subtitle;
    public function render()
    {
        return view('livewire.partial.header');
    }
}
