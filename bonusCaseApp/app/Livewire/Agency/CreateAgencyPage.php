<?php

namespace App\Livewire\Agency;

use App\Models\Agency;
use Livewire\Component;

class CreateAgencyPage extends Component
{
    public $name;
    public $description;

    protected $rules = [
        'name' => 'required',
        'description' => 'required',
    ];

    public function saved()
    {
        $this->validate();

        Agency::create([
            'name' => $this->name,
            'description' => $this->description,
        ]);

        return redirect()->route('agency.index');
    }

    public function render()
    {
        return view('livewire.agency.create-agency-page')
            ->extends('layouts.master')
            ->section('content');
    }
}
