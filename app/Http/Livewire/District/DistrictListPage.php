<?php

namespace App\Http\Livewire\District;

use Livewire\Component;
use App\Models\District;
use Livewire\WithPagination;

class DistrictListPage extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";
    
    public $searchTerm;

    protected $listeners = [
        'refreshDistrictList' => '$refresh'
    ];

    public function render()
    {
        $districts = District::query();

        if($this->searchTerm){
            $districts = $districts
                            ->where('dist_name','LIKE',"%{$this->searchTerm}%")
                            ->orWhere('dist_code','LIKE',"%{$this->searchTerm}%");
        }

        $districts = $districts->paginate(15);
        return view('livewire.district.district-list-page',[
            'districts' => $districts
        ])->extends('layouts.main');
    }
}
