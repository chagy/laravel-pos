<?php

namespace App\Http\Livewire\Province;

use Livewire\Component;
use App\Models\Province;
use Livewire\WithPagination;

class ProvinceListPage extends Component
{
    use WithPagination;

    protected $paginationTheme = "bootstrap";
    
    public $searchTerm;

    protected $listeners = [
        'refreshProvinceList' => '$refresh'
    ];

    public function render()
    {
        $provinces = Province::query();

        if($this->searchTerm){
            $provinces = $provinces
                            ->where('prov_name','LIKE',"%{$this->searchTerm}%")
                            ->orWhere('prov_code','LIKE',"%{$this->searchTerm}%");
        }

        $provinces = $provinces->paginate(15);

        return view('livewire.province.province-list-page',[
                    'provinces' => $provinces
                ])
                ->extends('layouts.main');
    }
}
