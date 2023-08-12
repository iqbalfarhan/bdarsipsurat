<?php

namespace App\Http\Livewire\Pages;

use App\Models\Surat;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Detailsurat extends Component
{

    public $suratid;
    public $data;

    public function mount(Surat $surat)
    {
        $this->data = $surat;
        $this->suratid = $surat->id;
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