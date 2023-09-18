<?php

namespace App\Http\Livewire\Pages;

use App\Models\Kategori;
use App\Models\Subkategori;
use App\Models\Surat;
use Livewire\Component;

class Home extends Component
{
    public $kat = 1;
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
        $this->reset([
            'sub'
        ]);
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
            'subkategories' => Subkategori::when($this->kat, function ($q) {
                return $q->where('kategori_id', $this->kat);
            })->get()->pluck('name', 'id'),
            'surats' => Surat::when($this->sub, function ($q) {
                return $q->where('subkategori_id', $this->sub);
            })->get()->pluck('perihal', 'id'),
        ]);
    }
}