<?php

namespace App\Livewire\Agency;

use App\Models\Agency;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class AgencyPage extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search;

    public function getAgencyProperty(): LengthAwarePaginator
    {
        return Agency::when(!empty($this->search), function ($q) {
            $q->where('name', 'LIKE', "%{$this->search}%");
        })
            ->latest()
            ->paginate(5);
    }

    public function deleteItem($id)
    {
        Agency::find($id)->delete();
    }


    public function render()
    {
        return view('livewire.agency.agency-page')
            ->extends('layouts.master')
            ->section('content');
    }
}
