<?php

namespace App\Http\Livewire\Partial\Kategori;

use App\Models\Kategori;
use App\Models\Subkategori;
use Livewire\Component;

class Editsub extends Component
{
    public $show = false;
    public $name;
    public $subkatid;
    public $kategori_id;

    protected $listeners = [
        'editsub'
    ];

    public function editsub(Subkategori $subkategori){
        if ($subkategori) {
            $this->subkatid = $subkategori->id;
            $this->kategori_id = $subkategori->kategori_id;
            $this->name = $subkategori->name;
            $this->show = true;
        }
    }

    public function simpan(){
        $valid = $this->validate([
            'name' => 'required',
            'kategori_id' => 'required',
        ]);

        Subkategori::find($this->subkatid)->update($valid);

        $this->emit('reload');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.partial.kategori.editsub', [
            'kats' => Kategori::pluck('name', 'id')
        ]);
    }
}
