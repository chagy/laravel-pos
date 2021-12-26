<?php

namespace App\Http\Livewire\Customer;

use App\Models\User;
use Livewire\Component;
use App\Models\District;
use App\Models\Province;
use App\Models\SubDistrict;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManagerStatic;

class CustomerFormPage extends Component
{
    use WithFileUploads;
    
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
    public $type=2;

    public $districts = [];
    public $subDistricts = [];

    public function rulesValidate()
    {
        if($this->idKey){
            return [
                'name' => 'required',
                'username' => 'required|unique:users,username,'.$this->idKey,
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

    public function storeImage()
    {
        if(!$this->avatar){
            return null;
        }

        $img = ImageManagerStatic::make($this->avatar)->encode('png');
        $name = date('YmdHis').Str::random().'.png';
        Storage::disk('customer')->put($name,$img);
        return $name;
    }

    public function mount($id = 0)
    {
        if($id > 0)
        {
            $customer = User::findOrFail($id);
            $this->idKey = $customer->id;
            $this->name = $customer->name;
            $this->email = $customer->email;
            $this->username = $customer->username;
            $this->phone = $customer->phone;
            $this->address = $customer->address;
            $this->province_id = $customer->province_id;
            $this->district_id = $customer->district_id;
            $this->sub_district_id = $customer->sub_district_id;
            $this->zip_code = $customer->zip_code;
            $this->type = $customer->type;
        }
    }

    public function save()
    {
        $this->validate($this->rulesValidate(),$this->messages);

        $customer = new User();

        if($this->idKey > 0){
            $customer = User::findOrFail($this->idKey);
            $customer->password = $this->password ? Hash::make($this->password) : $customer->password;
        }else{
            $customer->password = Hash::make($this->password);
        }

        $customer->name = $this->name;
        $customer->email = $this->email;
        $customer->username = $this->username;
        $customer->phone = $this->phone;
        $customer->address = $this->address;
        $customer->province_id = $this->province_id;
        $customer->district_id = $this->district_id;
        $customer->sub_district_id = $this->sub_district_id;
        $customer->zip_code = $this->zip_code;
        $customer->avatar = $this->storeImage();
        $customer->type = $this->type;

        $customer->save();

        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกข้อมูลอำเภอเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success',
            'url' => route('customer.list')
        ]);
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
        return view('livewire.customer.customer-form-page',[
            'provinces' => Province::where('prov_status',1)->orderBy('prov_name','asc')->get(),
        ])->extends('layouts.main');
    }
}
