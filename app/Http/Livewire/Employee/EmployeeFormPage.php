<?php

namespace App\Http\Livewire\Employee;

use Livewire\Component;
use App\Models\District;
use App\Models\Province;
use App\Models\SubDistrict;

class EmployeeFormPage extends Component
{
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
