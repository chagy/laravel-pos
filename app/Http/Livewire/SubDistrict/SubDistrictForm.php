<?php

namespace App\Http\Livewire\SubDistrict;

use Livewire\Component;
use App\Models\District;
use App\Models\Province;
use App\Models\SubDistrict;

class SubDistrictForm extends Component
{
    public $idKey = 0;
    public $subd_code;
    public $subd_name;
    public $subd_status = 1;
    public $subd_desc;
    public $subd_zip_code;
    public $province_id;
    public $district_id;

    public $districts = [];

    protected $listeners = [
        'editSubDistrict' => 'edit',
        'btnCreateSubDistrict' => 'resetInput'
    ];

    protected $rules = [
        'province_id' => 'required',
        'district_id' => 'required',
        'subd_code' => 'required',
        'subd_name' => 'required',
        'subd_zip_code' => 'required'
    ];

    protected $messages = [
        'province_id.required' => 'กรุณาเลือกจังหวัด',
        'district_id.required' => 'กรุณาเลือกอำเภอ',
        'subd_code.required' => 'กรุณากรอกรหัสตำบล',
        'subd_name.required' => 'กรุณากรอกชื่อตำบล',
        'subd_zip_code.required' => 'กรุณากรอกรหัสไปรษณีย์'
    ];

    public function edit($id)
    {
        $sub_district = SubDistrict::findOrFail($id);
        $this->idKey = $sub_district->id;
        $this->subd_code = $sub_district->subd_code;
        $this->subd_name = $sub_district->subd_name;
        $this->subd_status = $sub_district->subd_status;
        $this->subd_desc = $sub_district->subd_desc;
        $this->subd_zip_code = $sub_district->subd_zip_code;
        $this->province_id = $sub_district->district->province_id;
        $this->district_id = $sub_district->district_id;
    }

    public function resetInput()
    {
        $this->reset('subd_code');
        $this->reset('subd_name');
        $this->reset('subd_status');
        $this->reset('subd_desc');
        $this->reset('subd_zip_code');
        $this->reset('province_id');
        $this->reset('district_id');
    }

    public function save()
    {
        $this->validate($this->rules,$this->messages);

        SubDistrict::updateOrCreate([
            'id' => $this->idKey
        ],[
            'district_id' => $this->district_id,
            'subd_code' => $this->subd_code,
            'subd_name' => $this->subd_name,
            'subd_status' => $this->subd_status,
            'subd_desc' => $this->subd_desc,
            'subd_zip_code' => $this->subd_zip_code,
        ]);

        $this->resetInput();

        $this->emit("refreshSubDistrictList");

        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกข้อมูลตำบลเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success'
        ]);

        $this->emit("modalHide");
    }

    public function render()
    {
        $provinces = Province::where('prov_status',1)->orderBy('prov_name','asc')->get();

        if($this->province_id > 0){
            $this->districts = District::where('dist_status',1)
                                    ->where('province_id',$this->province_id)
                                    ->orderBy('dist_name','asc')
                                    ->get();
        }

        return view('livewire.sub-district.sub-district-form',[
            'provinces' => $provinces
        ]);
    }
}
