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

    public function assignRole(Permission $permission, $role){

        if ($permission->hasRole($role)) {
            $permission->removeRole($role);
        }
        else{
            $permission->assignRole($role);
        }
    }

    public function deleteRole(ModelsRole $role){
        $role->delete();
        $this->alert('success', "Role deleted successfully");
    }

    public function deletePermission(Permission $permission){
        $permission->delete();
        $this->alert('success', "Permission deleted successfully");
    }
    
    public function render()
    {
        return view('livewire.setting.role', [
            'roles' => ModelsRole::whereNot('name', 'superadmin')->get()->pluck('name', 'id'),
            'permissions' => Permission::when($this->cari, function($q){
                $q->where('name', 'like', '%'.$this->cari.'%');
            })->get(),
        ]);
    }
}
