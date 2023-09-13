<?php

namespace App\Http\Livewire\Component;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Logout extends Component
{

    protected $listeners = [
        'reload' => '$refresh',
        'logout' => 'handleLogout'
    ];

    public function handleLogout()
    {
        Auth::logout();
        return redirect()->route('home');
    }

    public function render()
    {
        return view('livewire.component.logout');
    }
}