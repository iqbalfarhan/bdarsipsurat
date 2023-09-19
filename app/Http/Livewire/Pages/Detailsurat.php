<?php

namespace App\Http\Livewire\Pages;

use App\Models\Surat;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Detailsurat extends Component
{
    use LivewireAlert;
    public $canAccess;
    public $password;
    public $suratid;
    public $data;

    public function periksaPassword() {
        $this->validate([
            'password' => 'required',
        ]);

        if (Hash::check($this->password, $this->data->password)) {
            $this->canAccess = true;
            return $this->alert('success', 'Berhasil membuka dokumen');
        } else {
            return $this->alert('warning', 'Gagal membuka dokumen, password dokumen salah');
        }

    }

    public function mount(Surat $surat)
    {
        $this->data = $surat;
        $this->suratid = $surat->id;
        
        if (!$surat->use_password){
            $this->canAccess = true;
        }
    }

    public function downloadfile(Surat $surat)
    {
        return Storage::download($surat->file, $surat->perihal);
    }

    public function render()
    {
        return view('livewire.pages.detailsurat');
    }
}