<?php

namespace App\Http\Livewire\Pages;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use Livewire\Component;
use Livewire\WithFileUploads;

class Profile extends Component
{
    use WithFileUploads;

    public $user;
    public $halaman = "login";
    public $password_old;
    public $password_new;
    public $confirm_new;
    public $name;
    public $username;
    public $gambar;
    
    public function mount()
    {
        $this->user = auth()->user();
        
        $this->name = $this->user->name;
        $this->username = $this->user->username;
    }
    
    public function simpan()
    {
        if ($this->halaman == "password") {
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
                'password' => Hash::make($this->password_new)
            ]);
            
            $this->reset([
                'password_old',
                'password_new',
                'confirm_new',
            ]);
        }
        elseif ($this->halaman == "login") {
            $user = $this->user;
            $valid = $this->validate([
                'name' => 'required',
                'username' => 'required|unique:users,username,' . $user->id,
            ]);
            
            User::find($user->id)->update($valid);
        }
        elseif ($this->halaman == "photo") {
            $this->validate([
                'image' => 'required|image',
            ]);

            Image::make($this->gambar)->fit(300);
        }
    }
    
    public function render()
    {
        return view('livewire.pages.profile');
    }
}