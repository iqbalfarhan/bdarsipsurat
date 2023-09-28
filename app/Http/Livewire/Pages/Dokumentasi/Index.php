<?php

namespace App\Http\Livewire\Pages\Dokumentasi;

use App\Models\Dokumentasi as Doc;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    public $selected;
    public $judul = "Selamat datanng di halaman dokumentasi";
    public $text;

    protected $listeners = [
        'reload' => '$refresh'
    ];

    public function selectDoc(Doc $dokumentasi)
    {
        $this->selected = $dokumentasi->id;
        $this->judul = $dokumentasi->title;
        $this->text = $dokumentasi->description;
    }

    public function editDokumentasi()
    {
        $this->emit('editDokumentasi', $this->selected);
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
            'datas' => Doc::get()->groupBy('group')
        ]);
    }
}
