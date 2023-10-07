<?php

namespace App\Http\Livewire\Partial\Kategori;

use App\Models\Subkategori;
use Livewire\Component;

class Show extends Component
{

    public $show = false;
    public $subkat_id = true;

    protected $listeners = [
        'showKategori'
    ];

    public function showKategori($subkat){
        $this->show = true;
        $this->subkat_id = $subkat;
    }

    public function render()
    {
        return view('livewire.partial.kategori.show', [
            'data' => $this->subkat_id ? Subkategori::find($this->subkat_id) : null,
        ]);
    }
}
