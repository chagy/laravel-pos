<?php

namespace App\Http\Livewire\Province;

use Livewire\Component;
use App\Models\Province;

class ProvinceListPage extends Component
{
    public $searchTerm;

    public function render()
    {
        $provinces = Province::query();

        if($this->searchTerm){
            $provinces = $provinces
                            ->where('prov_name','LIKE',"%{$this->searchTerm}%")
                            ->orWhere('prov_code','LIKE',"%{$this->searchTerm}%");
        }

        $provinces = $provinces->get();

        return view('livewire.province.province-list-page',[
                    'provinces' => $provinces
                ])
                ->extends('layouts.main');
    }
}
