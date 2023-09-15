<?php

namespace App\Http\Livewire\Partial\Setting;

use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class CreateRole extends Component
{
    public $jenis = "permission";
    public $name;

    public function simpan(){
        $this->validate([
            "name" => "required"
        ]);

        if($this->jenis == "permission"){
            Permission::create(['name' => $this->name]);
        }
        else{
            Role::create(['name' => $this->name]);
        }

        $this->emit("reload");
    }

    public function render()
    {
        return view('livewire.partial.setting.create-role');
    }
}
