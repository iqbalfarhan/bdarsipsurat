<?php

namespace App\Http\Livewire\Partial\User;

use App\Models\Unit;
use App\Models\User;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Edit extends Component
{

    protected $listeners = [
        'showEdit' => 'loadEdit'
    ];

    public $show = false;
    public $data;

    public $user_id;
    public $name;
    public $username;
    public $role;
    public $unit_id;


    public function loadEdit(User $user)
    {
        $this->data = $user;

        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->username = $user->username;
        $this->role = $user->getRoleNames()->first();
        $this->unit_id = $user->unit_id;
        $this->show = true;
    }

    public function simpan()
    {
        $valid = $this->validate([
            'name' => 'required',
            'username' => 'required',
            'role' => 'required',
            'unit_id' => 'required',
        ]);

        $this->data->update($valid);

        $this->emit('reload');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.partial.user.edit', [
            'units' => Unit::get()->pluck('name', 'id'),
            'roles' => Role::whereNot('name', 'superadmin')->get()->pluck('name')
        ]);
    }
}