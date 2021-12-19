<?php

namespace App\Http\Livewire\SubDistrict;

use Livewire\Component;
use App\Models\SubDistrict;
use Livewire\WithPagination;

class SubDistrictListPage extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";
    
    public $searchTerm;

    protected $listeners = [
        'refreshDistrictList' => '$refresh'
    ];

    public function render()
    {
        $subDistricts = SubDistrict::query();

        if($this->searchTerm){
            $subDistricts = $subDistricts
                            ->where('subd_name','LIKE',"%{$this->searchTerm}%")
                            ->orWhere('subd_code','LIKE',"%{$this->searchTerm}%");
        }

        $subDistricts = $subDistricts->paginate(15);
        
        return view('livewire.sub-district.sub-district-list-page',[
            'subDistricts' => $subDistricts
        ])->extends('layouts.main');
    }
}
