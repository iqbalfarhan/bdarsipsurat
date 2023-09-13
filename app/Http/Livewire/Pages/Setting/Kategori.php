<?php

namespace App\Http\Livewire\Pages\Setting;

use App\Models\Kategori as ModelsKategori;
use Livewire\Component;

class Kategori extends Component
{

    protected $listeners = [
        'reload' => '$refresh',
    ];

    public $showsub = false;

    public function render()
    {
        return view('livewire.pages.setting.kategori', [
            'datas' => ModelsKategori::withCount('subs')->get()
        ]);
    }
}