<?php

namespace App\Http\Livewire\Setting;

use App\Models\Setting;
use Livewire\Component;

class SettingPage extends Component
{
    public $sett_name;
    public $sett_phone;
    public $sett_tax_id;
    public $sett_vat;
    public $sett_owner;

    protected $rules = [
        'sett_name' => 'required',
        'sett_phone' => 'required',
        'sett_tax_id' => 'required',
        'sett_vat' => 'required|integer',
        'sett_owner' => 'required',
    ];

    protected $messages = [
        'sett_name.required' => 'กรุณากรอก ชื่อร้าน',
        'sett_phone.required' => 'กรุณากรอก เบอร์โทร',
        'sett_tax_id.required' => 'กรุณากรอก เลขที่เสียภาษี',
        'sett_vat.required' => 'กรุณากรอก Vat',
        'sett_owner.required' => 'กรุณากรอก ชื่อเจ้าของร้าน',
    ];

    public function save()
    {
        $this->validate($this->rules,$this->messages);

        $setting = Setting::orderBy('id','asc')->first();
        
        Setting::updateOrCreate([
            'id' => !empty($setting->id) ? $setting->id : 0,
        ],[
            'sett_name' => $this->sett_name,
            'sett_phone' => $this->sett_phone,
            'sett_tax_id' => $this->sett_tax_id,
            'sett_vat' => $this->sett_vat,
            'sett_owner' => $this->sett_owner,
        ]);

        $this->dispatchBrowserEvent('swal',[
            'title' => 'บันทึกข้อมูลการตั้งค่าเรียบร้อย',
            'timer' => 3000,
            'icon' => 'success',
        ]);
    }

    public function render()
    {
        $setting = Setting::orderBy('id','asc')->first();
        
        $this->sett_name = $setting->sett_name;
        $this->sett_phone = $setting->sett_phone;
        $this->sett_tax_id = $setting->sett_tax_id;
        $this->sett_vat = $setting->sett_vat;
        $this->sett_owner = $setting->sett_owner;

        return view('livewire.setting.setting-page')->extends('layouts.main');
    }
}
