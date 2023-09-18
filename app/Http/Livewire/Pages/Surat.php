<?php

namespace App\Http\Livewire\Pages;

use App\Models\Kategori;
use App\Models\Subkategori;
use App\Models\Surat as ModelsSurat;
use App\Models\Unit;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Surat extends Component
{
    
    use WithPagination;
    
    protected $paginationTheme = 'tailwind';
    
    protected $listeners = [
        'reload' => '$refresh'
    ];
    
    public $showFilter = false;
    public $perpage = 25;
    public $allowedUnitId = [];
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

    public function updating(){
        $this->resetPage();
    }
    
    function resetFilter()
    {
        $this->reset([
            'kat_id',
            'subkat_id',
            'jenis',
            'perihal',
            'unit_id'
        ]);
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
    
    public function mount()
    {    
        $this->unit_id = auth()->user()->unit_id;   

        if (auth()->user()->hasRole(['admin', 'superadmin'])) {
            $this->allowedUnitId = Unit::get()->pluck('id');
        }
        else{
            $this->allowedUnitId[] = auth()->user()->unit_id;
        }
    }
    
    public function render()
    {
        $datas = ModelsSurat::when($this->unit_id, function ($q) {
            return $q->where('unit_id', $this->unit_id);
        })->when($this->jenis, function ($q) {
            return $q->where('jenis', $this->jenis);
        })->when($this->perihal, function ($q) {
            return $q->where('perihal', 'like', '%' . $this->perihal . '%');
        })->when($this->kat_id, function ($q) {
            $subkat_ids = Subkategori::where('kategori_id', $this->kat_id)->get()->pluck('id');
            return $q->whereIn('subkategori_id', $subkat_ids);
        })->when($this->subkat_id, function ($q) {
            return $q->where('subkategori_id', $this->subkat_id);
        })->whereIn('unit_id', $this->allowedUnitId)->paginate($this->perpage);
        
        return view('livewire.pages.surat', [
            'datas' => $datas,
            'kategories' => Kategori::get()->pluck('name', 'id'),
            'units' => Unit::whereIn('id', $this->allowedUnitId)->get()->pluck('name', 'id'),
            'subkategories' => Subkategori::when($this->kat_id, function ($q) {
                return $q->where('kategori_id', $this->kat_id);
            })->get()->pluck('name', 'id'),
        ]);
    }
}