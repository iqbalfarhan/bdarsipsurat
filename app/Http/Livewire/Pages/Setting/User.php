<?php

namespace App\Http\Livewire\Pages\Setting;

use App\Models\User as ModelsUser;
use Livewire\Component;

class User extends Component
{
    protected $listeners = [
        'reload' => '$refresh'
    ];

    public function deleteUser(ModelsUser $user)
    {
        $user->delete();
    }

    public function render()
    {
        return view('livewire.pages.setting.user', [
            'datas' => ModelsUser::whereHas('roles', function ($query) {
                $query->whereIn('name', ['admin', 'user']);
            })->get()
        ]);
    }
}