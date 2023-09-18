<?php

namespace App\Http\Livewire\Partial\Kategori;

use App\Models\Kategori;
use App\Models\Subkategori;
use Livewire\Component;

class Create extends Component
{
    public $show = false;
    public $datas;
    public $selectkat;
    public $newkategori;
    public $subkategori;

    public function simpan()
    {
        $valid = $this->validate([
            'selectkat' => 'required',
            'subkategori' => 'required',
        ]);

        if ($this->selectkat == "+") {
            $validatekat = $this->validate([
                'newkategori' => 'required',
            ]);

            $newkat = Kategori::create([
                'name' => $validatekat['newkategori'],
            ]);

            $valid['selectkat'] = $newkat->id;
        }

        Subkategori::create([
            'kategori_id' => $valid['selectkat'],
            'name' => $valid['subkategori'],
        ]);

        $this->emit('reload');
        $this->reset();
    }

    public function render()
    {
        return view('livewire.partial.kategori.create', [
            'categories' => Kategori::get()->pluck('name', 'id')
        ]);
    }
}