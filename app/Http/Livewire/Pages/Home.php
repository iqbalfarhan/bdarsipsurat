<?php

namespace App\Http\Livewire\Pages;

use App\Models\Kategori;
use App\Models\SubKategori;
use App\Models\Surat;
use Livewire\Component;

class Home extends Component
{
    public $kat;
    public $katlabel;
    public $sub;
    public $sublabel;

    protected $listeners = [
        'reload' => '$refresh'
    ];
    public function resetkatsub()
    {
        $this->reset([
            'kat',
            'sub',
        ]);
    }

    public function setkat($katid, $katname)
    {
        $this->kat = $katid;
        $this->katlabel = $katname;
    }
    public function setsub($subid, $subname)
    {
        $this->sub = $subid;
        $this->sublabel = $subname;
    }

    public function render()
    {
        return view('livewire.pages.home', [
            'kategories' => Kategori::get()->pluck('name', 'id'),
            'subkategories' => SubKategori::when($this->kat, function ($q) {
                return $q->where('kategoris_id', $this->kat);
            })->get()->pluck('name', 'id'),
            'surats' => Surat::when($this->sub, function ($q) {
                return $q->where('sub_kategoris_id', $this->sub);
            })->get()->pluck('perihal', 'id'),
        ]);
    }
}