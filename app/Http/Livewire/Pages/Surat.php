<?php

namespace App\Http\Livewire\Pages;

use App\Models\Kategori;
use App\Models\SubKategori;
use App\Models\Surat as ModelsSurat;
use App\Models\Unit;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class Surat extends Component
{

    protected $listeners = [
        'reload' => '$refresh'
    ];
    public $kat_id;
    public $subkat_id;
    public $jenis;
    public $perihal;
    public $unit_id;

    public function updatedKatId()
    {
        $this->reset([
            'subkat_id'
        ]);
    }

    function resetFilter()
    {
        $this->reset();
    }

    public function download(ModelsSurat $surat)
    {
        $filename = implode(" - ", [
            date('dmy', strtotime($surat->created_at)),
            $surat->subkategori->kategori->name,
            $surat->subkategori->name,
            substr($surat->perihal, 0, 50),
            $surat->unit->name
        ]);
        return Storage::download($surat->file, $filename);
    }

    public function render()
    {
        $datas = ModelsSurat::when($this->unit_id, function ($q) {
            return $q->where('units_id', $this->unit_id);
        })->when($this->jenis, function ($q) {
            return $q->where('jenis', $this->jenis);
        })->when($this->perihal, function ($q) {
            return $q->where('perihal', 'like', '%' . $this->perihal . '%');
        })->when($this->kat_id, function ($q) {
            $subkat_ids = SubKategori::where('kategoris_id', $this->kat_id)->get()->pluck('id');
            return $q->whereIn('sub_kategoris_id', $subkat_ids);
        })->when($this->subkat_id, function ($q) {
            return $q->where('sub_kategoris_id', $this->subkat_id);
        })->get();

        return view('livewire.pages.surat', [
            'datas' => $datas,
            'kategories' => Kategori::get()->pluck('name', 'id'),
            'units' => Unit::get()->pluck('name', 'id'),
            'subkategories' => SubKategori::when($this->kat_id, function ($q) {
                return $q->where('kategoris_id', $this->kat_id);
            })->get()->pluck('name', 'id'),
        ]);
    }
}