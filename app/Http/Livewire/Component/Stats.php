<?php

namespace App\Http\Livewire\Component;

use Livewire\Component;

class Stats extends Component
{
    public function render()
    {
        return view('livewire.component.stats', [
            'user' => auth()->user()
        ]);
    }
}
