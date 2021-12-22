<?php

namespace App\Http\Livewire\Employee;

use Livewire\Component;
use App\Models\District;
use App\Models\Province;
use App\Models\SubDistrict;

class EmployeeFormPage extends Component
{
    public $idKey=0;
    public $name;
    public $email;
    public $password;
    public $username;
    public $phone;
    public $address;
    public $province_id;
    public $district_id;
    public $sub_district_id;
    public $zip_code;
    public $avatar;
    public $type=1;

    public $districts = [];
    public $subDistricts = [];

    public function rulesValidate()
    {
        if($this->idKey){
            return [
                'name' => 'required',
                'username' => 'required|unique:users,username,'.$this->idKey,
                'password' => 'required|min:8',
                'phone' => 'required',
                'address' => 'required',
                'province_id' => 'required',
                'district_id' => 'required',
                'sub_district_id' => 'required',
                'zip_code' => 'required'
            ];
        }else{
            return [
                'name' => 'required',
                'username' => 'required|unique:users,username',
                'password' => 'required|min:8',
                'phone' => 'required',
                'address' => 'required',
                'province_id' => 'required',
                'district_id' => 'required',
                'sub_district_id' => 'required',
                'zip_code' => 'required'
            ];
        }
    }

    protected $messages = [
        'name.required' => 'กรุณากรอกชื่อ',
        'username.required' => 'กรุณากรอก Username',
        'username.unique' => 'Username นี้มีอยู่ในระบบแล้ว',
        'password.required' => 'กรุณากรอกรหัสผ่าน',
        'password.min' => 'กรุณากรอกรหัสผ่าน 8 ตัวอักษรขึ้นไป',
        'phone.required' => 'กรุณากรอกเบอร์โทรศัพท์',
        'address.required' => 'กรุณากรอกที่อยู่',
        'province_id.required' => 'กรุณาเลือกจังหวัด',
        'district_id.required' => 'กรุณาเลือกอำเภอ',
        'sub_district_id.required' => 'กรุณาเลือกตำบล',
        'zip_code.required' => 'กรุณากรอกรหัสไปรษณีย์'
    ];

    public function save()
    {
        $this->validate($this->rulesValidate(),$this->messages);
    }

    public function render()
    {
        if($this->province_id){
            $this->districts = District::where('dist_status',1)->where('province_id',$this->province_id)->get();
        }
        
        if($this->district_id){
            $this->subDistricts = SubDistrict::where('subd_status',1)->where('district_id',$this->district_id)->get();
        }

        if($this->sub_district_id){
            $subd = SubDistrict::findOrFail($this->sub_district_id);
            $this->zip_code = $subd->subd_zip_code;
        }

        return view('livewire.employee.employee-form-page',[
            'provinces' => Province::where('prov_status',1)->orderBy('prov_name','asc')->get(),
        ])->extends('layouts.main');
    }
}
