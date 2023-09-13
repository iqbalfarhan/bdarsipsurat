<?php

namespace App\Http\Livewire\Partial\User;

use App\Models\Unit;
use App\Models\User;
use Livewire\Component;

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
    public $units_id;


    public function loadEdit(User $user)
    {
        $this->data = $user;

        $this->user_id = $user->id;
        $this->name = $user->name;
        $this->username = $user->username;
        $this->role = $user->role;
        $this->units_id = $user->units_id;
        $this->show = true;
    }

    public function simpan()
    {
        $valid = $this->validate([
            'name' => 'required',
            'username' => 'required',
            'role' => 'required',
            'units_id' => 'required',
        ]);

        $this->data->update($valid);

        $this->emit('reload');

        $this->reset();
    }

    public function render()
    {
        return view('livewire.partial.user.edit', [
            'units' => Unit::get()->pluck('name', 'id'),
        ]);
    }
}