<?php

namespace App\Http\Livewire\Partial\Kategori;

use App\Models\Kategori;
use Livewire\Component;

class Edit extends Component
{
    public $show = false;
    public $katid;
    public $name;
    public $warna;

    protected $listeners = [
        'editKat'
    ];

    public function editKat($katid){
        $this->show = true;
        $kat = Kategori::find($katid);

        $this->katid = $kat->id;
        $this->name = $kat->name;
        $this->warna = $kat->warna;
    }

    public function simpan(){
        $valid = $this->validate([
            'name' => 'required',
            'warna' => 'required',
        ]);

        Kategori::find($this->katid)->update($valid);

        $this->reset();

        $this->emit('reload');
    }

    public function render()
    {
        return view('livewire.partial.kategori.edit', [
            'data' => $this->katid ? Kategori::find($this->katid) : null,
        ]);
    }
}
