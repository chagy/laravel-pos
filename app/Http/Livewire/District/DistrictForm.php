<?php

namespace App\Http\Livewire\District;

use Livewire\Component;
use App\Models\District;
use App\Models\Province;

class DistrictForm extends Component
{
    public $idKey = 0;
    public $dist_code;
    public $dist_name;
    public $dist_status = 1;
    public $dist_desc;
    public $province_id;

    protected $listeners = [
        'editDistrict' => 'edit',
        'btnCreateDistrict' => 'resetInput'
    ];

    protected $rules = [
        'province_id' => 'required',
        'dist_code' => 'required',
        'dist_name' => 'required'
    ];

    protected $messages = [
        'province_id.required' => 'กรุณาเลือกจังหวัด',
        'dist_code.required' => 'กรุณากรอกรหัสอำเภอ',
        'dist_name.required' => 'กรุณากรอกชื่ออำเภอ'
    ];

    public function edit($id)
    {
        $district = District::findOrFail($id);
        $this->idKey = $district->id;
        $this->dist_code = $district->dist_code;
        $this->dist_name = $district->dist_name;
        $this->dist_status = $district->dist_status;
        $this->dist_desc = $district->dist_desc;
        $this->province_id = $district->province_id;
    }

    public function resetInput()
    {
        $this->reset('dist_code');
        $this->reset('dist_name');
        $this->reset('dist_status');
        $this->reset('dist_desc');
        $this->reset('province_id');
    }

    public function save()
    {
        $this->validate($this->rules,$this->messages);

        District::updateOrCreate([
            'id' => $this->idKey
        ],[
            'province_id' => $this->province_id,
            'dist_code' => $this->dist_code,
            'dist_name' => $this->dist_name,
            'dist_status' => $this->dist_status,
            'dist_desc' => $this->dist_desc,
        ]);

        $this->resetInput();

        $this->emit("refreshDistrictList");

        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกข้อมูลอำเภอเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success'
        ]);

        $this->emit("modalHide");
    }

    public function render()
    {
        return view('livewire.district.district-form',[
            'provinces' => Province::where('prov_status',1)->orderBy('prov_name','asc')->get()
        ]);
    }
}
