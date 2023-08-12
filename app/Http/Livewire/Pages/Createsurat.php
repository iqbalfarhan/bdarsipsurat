<?php

namespace App\Http\Livewire\Pages;

use App\Models\Kategori;
use App\Models\Surat;
use App\Models\Unit;
use Livewire\Component;
use Livewire\WithFileUploads;

class Createsurat extends Component
{
    use WithFileUploads;
    public $kategori_id;
    public $subkategori_id;
    public $unit_id;
    public $jenis = 'masuk';
    public $perihal;
    public $file;

    public function simpan()
    {
        $this->validate([
            'subkategori_id' => 'required',
            'unit_id' => 'required',
            'jenis' => 'required',
            'perihal' => 'required',
        ]);

        $filename = null;

        if ($this->file) {
            $file = $this->file;
            $file->store('surat');
            $filename = $file->hashName('surat');
        }

        Surat::create([
            'sub_kategoris_id' => $this->subkategori_id,
            'unit_id' => $this->unit_id,
            'jenis' => $this->jenis,
            'perihal' => $this->perihal,
            'file' => $filename,
        ]);

        $this->reset();
    }

    public function render()
    {
        return view('livewire.pages.createsurat', [
            'subkategories' => Kategori::get(),
            'units' => Unit::get()->pluck('name', 'id')
        ]);
    }
}