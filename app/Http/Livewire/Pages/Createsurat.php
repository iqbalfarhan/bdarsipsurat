<?php

namespace App\Http\Livewire\Pages;

use App\Models\Kategori;
use App\Models\Surat;
use App\Models\Unit;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithFileUploads;

class Createsurat extends Component
{
    use WithFileUploads, LivewireAlert;
    public $kategori_id;
    public $subkategori_id;
    public $unit_id;
    public $jenis = 'masuk';
    public $perihal;
    public $use_password;
    public $password;
    public $file;

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

        Surat::create([
            'subkategori_id' => $this->subkategori_id,
            'unit_id' => $this->unit_id,
            'jenis' => $this->jenis,
            'perihal' => $this->perihal,
            'file' => $filename,
            'use_password' => $this->use_password ? true : false,
            'password' => $this->use_password ? Hash::make($this->password) : null,
            'user_id' => auth()->id(),
        ]);

        $this->alert('success', 'Surat berhasil ditambahkan');

        $this->reset();
    }

    public function resetForm(){
        $this->reset([
            'subkategori_id',
            'jenis',
            "perihal",
            "file",
            "use_password",
            "password",
            "unit_id",
        ]);
    }

    public function render()
    {
        return view('livewire.pages.createsurat', [
            'subkategories' => Kategori::get(),
            'units' => Unit::get()->pluck('name', 'id')
        ]);
    }
}