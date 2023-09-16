<?php

namespace App\Http\Livewire\Pages;

use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Login extends Component
{
    use LivewireAlert;

    public $username = "";
    public $password = "";

    public function submit()
    {
        $valid = $this->validate([
            'username' => 'required',
            'password' => 'required',
        ]);

        if (Auth::attempt($valid)) {
            $this->alert('success', 'Login Success, Selamat datang di '.config('app.name'));
            return redirect()->route('home');
        }
        else{
            $this->alert('error', 'Login failed, user not found');
        }
    }

    public function render()
    {
        return view('livewire.pages.login');
    }
}