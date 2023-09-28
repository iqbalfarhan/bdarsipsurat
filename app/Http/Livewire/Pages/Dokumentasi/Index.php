<?php

namespace App\Http\Livewire\Pages\Dokumentasi;

use App\Models\Dokumentasi as Doc;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class Index extends Component
{
    public $judul = "Selamat datanng di halaman dokumentasi";
    public $text = "silakan pilih menu dokumentasi untuk melihat detail dokumentasi. dokumentasi sudah di grouping berdasarkan lorem ipsum";

    public function selectDoc(Doc $dokumentasi){
        $this->judul = $dokumentasi->title;
        $this->text = $dokumentasi->description;
    }

    public function resetText(){
        $this->reset();
    }

    public function render()
    {
        return view('livewire.pages.dokumentasi.index', [
            'datas' => Doc::get()->groupBy('group')
        ]);
    }
}
