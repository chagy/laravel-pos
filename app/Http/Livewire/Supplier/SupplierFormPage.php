<?php

namespace App\Http\Livewire\Supplier;

use Livewire\Component;
use App\Models\District;
use App\Models\Province;
use App\Models\Supplier;
use App\Models\SubDistrict;

class SupplierFormPage extends Component
{
    public $idKey=0;
    public $sup_name;
    public $sup_tax_number;
    public $sup_email;
    public $sup_phone;
    public $sup_address;
    public $province_id;
    public $district_id;
    public $sub_district_id;
    public $sup_zip_code;
    public $sup_contact_name;
    public $sup_contact_phone;
    public $sup_status=1;

    public $districts = [];
    public $subDistricts = [];

    protected $rules = [
        'sup_name' => 'required',
        'sup_address' => 'required',
        'province_id' => 'required',
        'district_id' => 'required',
        'sub_district_id' => 'required',
        'sup_zip_code' => 'required',
        'sup_contact_name' => 'required',
        'sup_contact_phone' => 'required',
    ];

    protected $messages = [
        'sup_name.required' => 'กรุณากรอกชื่อบริษัท',
        'sup_address.required' => 'กรุณากรอกที่อยู่',
        'province_id.required' => 'กรุณาเลือกจังหวัด',
        'district_id.required' => 'กรุณาเลือกอำเภอ',
        'sub_district_id.required' => 'กรุณาเลือกตำบล',
        'sup_zip_code.required' => 'กรุณากรอกรหัสไปรษณีย์',
        'sup_contact_name.required' => 'กรุณากรอกชื่อผู้ติดต่อ',
        'sup_contact_phone.required' => 'กรุณากรอกเบอร์โทรผู้ติดต่อ',
    ];

    public function save()
    {
        $this->validate($this->rules,$this->messages);

        Supplier::updateOrCreate([
            'id' => $this->idKey
        ],[
            'sup_name' => $this->sup_name,
            'sup_tax_number' => $this->sup_tax_number,
            'sup_email' => $this->sup_email,
            'sup_phone' => $this->sup_phone,
            'sup_address' => $this->sup_address,
            'province_id' => $this->province_id,
            'district_id' => $this->district_id,
            'sub_district_id' => $this->sub_district_id,
            'sup_zip_code' => $this->sup_zip_code,
            'sup_contact_name' => $this->sup_contact_name,
            'sup_contact_phone' => $this->sup_contact_phone,
            'sup_status' => $this->sup_status,
        ]);

        $this->resetInput();

        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกข้อมูลผู้ผลิตเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success',
            'url' => route('supplier.list')
        ]);

    }

    public function resetInput()
    {
        $this->reset('idKey');
        $this->reset('sup_name');
        $this->reset('sup_tax_number');
        $this->reset('sup_email');
        $this->reset('sup_phone');
        $this->reset('sup_address');
        $this->reset('province_id');
        $this->reset('district_id');
        $this->reset('sub_district_id');
        $this->reset('sup_zip_code');
        $this->reset('sup_contact_name');
        $this->reset('sup_contact_phone');
        $this->reset('sup_status');
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
            $this->sup_zip_code = $subd->subd_zip_code;
        }

        return view('livewire.supplier.supplier-form-page',[
            'provinces' => Province::where('prov_status',1)->orderBy('prov_name','asc')->get(),
        ])->extends('layouts.main');
    }
}
