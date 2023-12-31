<?php

namespace App\Http\Livewire\Pages\Setting;

use App\Models\Kategori as ModelsKategori;
use App\Models\Subkategori;
use Livewire\Component;

class Kategori extends Component
{

    public $cari;

    protected $listeners = [
        'reload' => '$refresh',
    ];

    public function deleteSubkat(Subkategori $subkategori){
        $subkategori->delete();
    }

    public function render()
    {
        $datas = ModelsKategori::when($this->cari, function($q){
            return $q->where('name', 'like', '%'.$this->cari.'%')->orWhereHas('subs', function($r){
                return $r->where('name', 'like', '%'.$this->cari.'%');
            });
        })->with('subs')->withCount('subs')->get();
        return view('livewire.pages.setting.kategori', [
            'datas' => $datas
        ]);
    }
}