<?php

namespace App\Http\Livewire\Pages;

use App\Models\Kategori;
use App\Models\Subkategori;
use App\Models\Surat;
use App\Models\Unit;
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
        // $allowedUnit = auth()->user()->hasRole(['admin', 'superadmin']) ? Unit::pluck('id') : [auth()->user()->unit_id];
        $allowedUnit = Unit::pluck('id');

        return view('livewire.pages.home', [
            'kategories' => Kategori::get(),
            'subkategories' => Subkategori::when($this->kat, function ($q) {
                return $q->where('kategori_id', $this->kat);
            })->get()->pluck('name', 'id'),
            'surats' => Surat::whereIn('unit_id', $allowedUnit)->when($this->sub, function ($q) {
                return $q->where('subkategori_id', $this->sub);
            })->get()->pluck('perihal', 'id'),
        ]);
    }
}