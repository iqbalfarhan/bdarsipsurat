<?php

namespace App\Http\Livewire\Pages\Dokumentasi;

use App\Models\Dokumentasi;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class Edit extends Component
{
    public $show = false;
    public $data;
    public $group;
    public $permission;
    public $title;
    public $description;
    public $video;

    protected $listeners = [
        'editDokumentasi'
    ];

    public function editDokumentasi(Dokumentasi $dokumentasi)
    {
        $this->data = $dokumentasi;

        $this->group = $dokumentasi->group;
        $this->permission = $dokumentasi->permission;
        $this->title = $dokumentasi->title;
        $this->description = $dokumentasi->description;
        $this->video = $dokumentasi->video;

        $this->show = true;
    }

    public function simpan()
    {
        $valid = $this->validate([
            'group' => 'required',
            'permission' => 'required',
            'title' => 'required',
            'description' => 'required',
            'video' => '',
        ]);

        Dokumentasi::find($this->data->id)->update($valid);

        $this->reset();

        $this->emit('reload');
    }

    public function render()
    {
        return view('livewire.pages.dokumentasi.edit', [
            'permissions' => Permission::pluck('name')
        ]);
    }
}
