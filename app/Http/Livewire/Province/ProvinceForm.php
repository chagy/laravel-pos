<?php

namespace App\Http\Livewire\Province;

use Livewire\Component;
use App\Models\Province;

class ProvinceForm extends Component
{
    public $idKey = 0;
    public $prov_code;
    public $prov_name;
    public $prov_status = 1;
    public $prov_desc;

    public function save()
    {
        Province::updateOrCreate([
            'id' => $this->idKey
        ],[
            'prov_code' => $this->prov_code,
            'prov_name' => $this->prov_name,
            'prov_status' => $this->prov_status,
            'prov_desc' => $this->prov_desc,
        ]);
    }

    public function render()
    {
        return view('livewire.province.province-form');
    }
}
