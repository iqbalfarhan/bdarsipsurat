<?php

namespace App\Http\Livewire\Partial\User;

use App\Models\Unit;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class Tambah extends Component
{
    public $show = false;
    public $name;
    public $username;
    public $password;
    public $unit_id;
    public $role = 'user';

    public function simpan()
    {
        $valid = $this->validate([
            'name' => 'required',
            'username' => 'required',
            'password' => 'required',
            'unit_id' => 'required',
            'role' => 'required',
        ]);

        $valid['password'] = Hash::make($this->password);
        $valid['units_id'] = $this->unit_id;

        $user = User::create($valid);
        $user->assignRole($this->role);

        $this->emit('reload');
        $this->reset();
    }
    public function render()
    {
        return view('livewire.partial.user.tambah', [
            'units' => Unit::get()->pluck('name', 'id'),
            'roles' => Role::get()->pluck('name', 'id')
        ]);
    }
}