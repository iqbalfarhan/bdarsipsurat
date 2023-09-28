<?php

namespace App\Http\Livewire\Pages\Dokumentasi;

use App\Models\Dokumentasi;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Create extends Component
{
    public $show = false;
    public $group;
    public $permission;
    public $title;
    public $description;
    public $video;


    public function simpan()
    {
        $valid = $this->validate([
            'group' => 'required',
            'permission' => 'required',
            'title' => 'required',
            'description' => 'required',
            'video' => '',
        ]);

        Dokumentasi::create($valid);

        $this->reset();

        $this->emit('reload');
    }

    public function render()
    {
        return view('livewire.pages.dokumentasi.create', [
            'permissions' => Permission::pluck('name')
        ]);
    }
}
