<?php

namespace App\Http\Livewire\Component;

use Livewire\Component;

class Icon extends Component
{
    public $name;
    public $class;

    public function mount($name = "home", $class = "w-4 h-4")
    {
        $this->name = $name;
        $this->class = $class;
    }

    public function render()
    {
        return view('livewire.component.icon');
    }
}