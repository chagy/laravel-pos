<?php

namespace App\Http\Livewire\Province;

use Livewire\Component;

class ProvinceForm extends Component
{
    public $idKey = 0;
    public $prov_code;
    public $prov_name;
    public $prov_status = 1;
    public $prov_desc;
    
    public function render()
    {
        return view('livewire.province.province-form');
    }
}
