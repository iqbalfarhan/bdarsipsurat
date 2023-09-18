<?php

namespace App\Http\Livewire\Partial\User;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Resetpass extends Component
{
    use LivewireAlert;
    
    public $show = false;
    public $user;

    protected $listeners = [
        'resetuserpass' => 'resetUserPassword'
    ];

    public function resetUserPassword(User $user)
    {
        $this->show = true;
        $this->user = $user;
    }

    public function simpan()
    {
        $this->user->update([
            'password' => Hash::make('password123')
        ]);

        $this->reset();

        $this->alert('success', 'Berhasil mereset password user');
    }
    public function render()
    {
        return view('livewire.partial.user.resetpass');
    }
}