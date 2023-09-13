<?php

namespace App\Http\Livewire\Pages\Setting;

use App\Models\Unit as ModelsUnit;
use Livewire\Component;

class Unit extends Component
{
    public $newunit;
    public $editMode = false;
    public $selected;

    protected $listeners = [
        'reload' => '$refresh'
    ];

    public function bataledit()
    {
        $this->reset();
    }

    public function perbarui()
    {
        $unit = ModelsUnit::find($this->selected);
        $unit->update([
            'name' => $this->newunit
        ]);

        $this->emit('reload');
        $this->reset();
    }

    public function selectUnit(ModelsUnit $unit)
    {
        $this->editMode = true;
        $this->selected = $unit->id;
        $this->newunit = $unit->name;
    }

    public function simpan()
    {
        $valid = $this->validate([
            'newunit' => 'required',
        ]);

        ModelsUnit::create([
            'name' => $this->newunit
        ]);

        $this->emit('reload');
        $this->reset();
    }
    public function render()
    {
        return view('livewire.pages.setting.unit', [
            'datas' => ModelsUnit::get()->pluck('name', 'id')
        ]);
    }
}