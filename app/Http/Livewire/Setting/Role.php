<?php

namespace App\Http\Livewire\Setting;

use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role as ModelsRole;

class Role extends Component
{

    use LivewireAlert;

    public $cari;

    public $listeners = [
        'reload' => '$refresh'
    ];

    public function deleteRole(ModelsRole $role){
        $role->delete();
    }

    public function deletePermission(Permission $permission){
        $permission->delete();
        $this->alert('success', 'permission deleted successfully');
    }
    
    public function render()
    {
        return view('livewire.setting.role', [
            'roles' => ModelsRole::whereNot('name', 'superadmin')->get()->pluck('name', 'id'),
            'permissions' => Permission::when($this->cari, function($q){
                $q->where('name', 'like', '%'.$this->cari.'%');
            })->get()->pluck('name', 'id'),
        ]);
    }
}
