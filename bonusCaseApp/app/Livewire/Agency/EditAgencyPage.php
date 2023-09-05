<?php

namespace App\Livewire\Agency;

use App\Models\Agency;
use Livewire\Component;

class EditAgencyPage extends Component
{
    public $agencyId;
    public $name;
    public $description;

    public function mount($id)
    {
        $agency = Agency::find($id);

        $this->agencyId = $agency->id;

        $this->name = $agency->name;
        $this->description = $agency->description;
    }

    protected $rules = [
        'name' => 'required',
        'description' => 'required',
    ];

    public function saved()
    {
        $this->validate();

        Agency::find($this->agencyId)->update([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        return redirect()->route('agency.index');
    }

    public function render()
    {
        return view('livewire.agency.edit-agency-page')
            ->extends('layouts.master')
            ->section('content');
    }
}
