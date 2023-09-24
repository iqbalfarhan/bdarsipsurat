<?php

namespace App\Http\Livewire\Pages;

use App\Models\Kategori;
use App\Models\Surat;
use App\Models\Unit;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Editsurat extends Component
{
    use WithFileUploads, LivewireAlert;
    
    public $surat;
    public $surat_id;

    public $kategori_id;
    public $subkategori_id;
    public $unit_id;
    public $jenis = 'masuk';
    public $perihal;
    public $use_password;
    public $password;
    public $file;
    public $filebefore;

    public function simpan()
    {
        $this->validate([
            'subkategori_id' => 'required',
            'unit_id' => 'required',
            'jenis' => 'required',
            'perihal' => 'required',
            'password' => $this->use_password ? 'required' : '',
        ]);

        $filename = null;

        if ($this->file) {
            $file = $this->file;
            $file->store('surat');
            $filename = $file->hashName('surat');
        }

        $this->surat->update([
            'subkategori_id' => $this->subkategori_id,
            'unit_id' => $this->unit_id,
            'jenis' => $this->jenis,
            'perihal' => $this->perihal,
            'file' => $this->file ? $filename : $this->filebefore,
            'use_password' => $this->use_password ? true : false,
            'password' => $this->use_password ? Hash::make($this->password) : null,
            'user_id' => auth()->id(),
        ]);

        $this->flash('success', 'Surat berhasil diedit');

        return redirect()->route('detailsurat', $this->surat_id);

    }

    public function mount(Surat $surat){
        $this->surat = $surat;

        $this->surat_id = $surat->id;
        $this->kategori_id = $surat->kategori_id;
        $this->subkategori_id = $surat->subkategori_id;
        $this->unit_id = $surat->unit_id;
        $this->jenis = $surat->jenis;
        $this->perihal = $surat->perihal;
        $this->use_password = $surat->use_password;
        $this->filebefore = $surat->file;
    }

    public function render()
    {
        return view('livewire.pages.editsurat', [
            'subkategories' => Kategori::get(),
            'units' => Unit::get()->pluck('name', 'id')
        ]);
    }
}
