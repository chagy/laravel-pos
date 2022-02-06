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

    public function render()
    {
        return view('livewire.setting.setting-page')->extends('layouts.main');
    }
}
