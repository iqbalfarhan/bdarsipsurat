<?php

namespace App\Http\Livewire\Pages\Dokumentasi;

use App\Models\Dokumentasi as Doc;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    public $cari;
    public $selected;
    public $text;

    protected $listeners = [
        'reload' => '$refresh'
    ];

    public function selectDoc(Doc $dokumentasi)
    {
        $this->selected = $dokumentasi;
    }

    public function editDokumentasi()
    {
        $this->emit('editDokumentasi', $this->selected->id);
    }

    public function resetText(){
        $this->mount();
    }

    public function mount()
    {
        $this->text = file_get_contents(base_path('README.md'));
    }

    public function render()
    {
        return view('livewire.pages.dokumentasi.index', [
            'datas' => Doc::when($this->cari, function($q){
                $q->where('title', 'like', '%'.$this->cari.'%');
            })->get()->groupBy('group')
        ]);
    }
}
