<?php

namespace App\Http\Livewire\Setting;

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
    }

    public function render()
    {
        return view('livewire.setting.setting-page')->extends('layouts.main');
    }
}
