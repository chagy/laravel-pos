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

    protected $listeners = [
        'editProvince' => 'edit',
        'btnCreateProvince' => 'resetInput'
    ];

    protected $rules = [
        'prov_code' => 'required',
        'prov_name' => 'required'
    ];

    protected $messages = [
        'prov_code.required' => 'กรุณากรอกรหัสจังหวัด',
        'prov_name.required' => 'กรุณากรอกชื่อจังหวัด'
    ];

    public function edit($id)
    {
        $province = Province::findOrFail($id);
        $this->idKey = $province->id;
        $this->prov_code = $province->prov_code;
        $this->prov_name = $province->prov_name;
        $this->prov_status = $province->prov_status;
        $this->prov_desc = $province->prov_desc;
    }

    public function resetInput()
    {
        $this->reset('prov_code');
        $this->reset('prov_name');
        $this->reset('prov_status');
        $this->reset('prov_desc');
    }

    public function save()
    {
        $this->validate($this->rules,$this->messages);

        Province::updateOrCreate([
            'id' => $this->idKey
        ],[
            'prov_code' => $this->prov_code,
            'prov_name' => $this->prov_name,
            'prov_status' => $this->prov_status,
            'prov_desc' => $this->prov_desc,
        ]);

        $this->resetInput();

        $this->emit("refreshProvinceList");

        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกข้อมูลจังหวัดเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success'
        ]);

        $this->emit("modalHide");
    }

    public function render()
    {
        return view('livewire.province.province-form');
    }
}
