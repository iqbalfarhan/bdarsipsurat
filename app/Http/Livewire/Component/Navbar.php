<?php

namespace App\Http\Livewire\Component;

use App\Models\Surat;
use App\Models\User;
use Livewire\Component;

class Navbar extends Component
{
    public $cari;

    public function render()
    {
        return view('livewire.component.navbar', [
            'surat' => $this->cari ? Surat::where('perihal', 'like', '%'.$this->cari.'%')->limit(5)->get()->pluck('perihal', 'id') : [],
            'user' => $this->cari ? User::where('name', 'like', '%'.$this->cari.'%')->limit(5)->get()->pluck('name', 'id') : [],
        ]);
    }
}
