<?php

namespace App\Http\Livewire\Pages;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Profile extends Component
{

    public $user;

    public $password_old;
    public $password_new;
    public $confirm_new;

    public $name;
    public $username;

    public function mount()
    {
        $this->user = auth()->user();

        $this->name = $this->user->name;
        $this->username = $this->user->username;
    }

    public function gantipass()
    {
        $user = $this->user;
        $this->validate([
            'password_old' => [
                'required',
                function ($attribute, $value, $fail) use ($user) {
                    if (!Hash::check($value, $user->password)) {
                        $fail('Password lama tidak sesuai.');
                    }
                }
            ],
            'password_new' => 'required',
            'confirm_new' => 'required|same:password_new',
        ]);

        User::find($user->id)->update([
            'password' => Hash::make('$this->password_new')
        ]);

        $this->reset([
            'password_old',
            'password_new',
            'confirm_new',
        ]);
    }

    public function simpan()
    {
        $user = $this->user;
        $valid = $this->validate([
            'name' => 'required',
            'username' => 'required|unique:users,username,' . $user->id,
        ]);
        User::find($user->id)->update($valid);
    }

    public function render()
    {
        return view('livewire.pages.profile');
    }
}