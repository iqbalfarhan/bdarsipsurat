<?php

namespace App\Http\Livewire\Pages;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{

    public $username = "";
    public $password = "";

    public function submit()
    {
        $valid = $this->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($valid)) {
            return redirect()->route('home');
        }
    }

    public function render()
    {
        return view('livewire.pages.login');
    }
}